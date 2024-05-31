<?php
session_start();

if (!isset($_SESSION['level']) || $_SESSION['level'] !== 'user') {
    header('Location: index.php');
    exit;
}

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "kesehatan");

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mulai transaksi
mysqli_begin_transaction($koneksi);

// Ambil ID pengguna dari sesi
$id_user = $_SESSION['id_user'];

// Ambil data dari tabel keranjang
$query_keranjang = "SELECT keranjang.id_keranjang, keranjang.id_obat, obat.nama_obat, obat.harga_obat, keranjang.jumlah, 
                    (obat.harga_obat * keranjang.jumlah) AS total_harga, obat.img
                    FROM keranjang 
                    INNER JOIN obat ON keranjang.id_obat = obat.id_obat 
                    WHERE keranjang.id_user = '$id_user'";
$result_keranjang = mysqli_query($koneksi, $query_keranjang);

// Ambil data metode pembayaran
$query_payment = "SELECT * FROM payment";
$result_payment = mysqli_query($koneksi, $query_payment);

// Ambil data ongkir
$query_ongkir = "SELECT * FROM ongkir";
$result_ongkir = mysqli_query($koneksi, $query_ongkir);

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alamat = $_POST['alamat'];
    $payment_id = $_POST['payment'];
    $ongkir_id = $_POST['ongkir'];
    $tanggal_checkout = date('Y-m-d H:i:s'); // Mendapatkan tanggal dan waktu saat ini
    
    // Validasi data
if (!empty($alamat) && !empty($payment_id) && !empty($ongkir_id)) {
    // Hitung total biaya
    $total_biaya = 0;
    $id_keranjang = 0;
    $id_obat_array = array(); // Inisialisasi array untuk menyimpan id_obat
    $jumlah_array = array();  // Inisialisasi array untuk menyimpan jumlah

    while ($row = mysqli_fetch_assoc($result_keranjang)) {
        $total_biaya += $row['total_harga'];
        // Retrieve id_keranjang
        $id_keranjang = $row['id_keranjang'];
        $id_obat_array[] = $row['id_obat'];
        $jumlah[] = $row['jumlah']; // Simpan jumlah yang dibeli
        $jumlah_array[] = $row['jumlah'];
     
    }

    // Ambil biaya ongkir
    $ongkir_query = "SELECT Harga_ongkir FROM ongkir WHERE id_ongkir = '$ongkir_id'";
    $result_ongkir = mysqli_query($koneksi, $ongkir_query);
    $row_ongkir = mysqli_fetch_assoc($result_ongkir);
    $total_biaya += $row_ongkir['Harga_ongkir'];

    // Convert array id_obat to comma separated string
    $id_obat_string = implode(",", $id_obat_array);
    $jumlah_string = implode(",", $jumlah_array); // Convert jumlah array to comma separated string

    // Masukkan data ke tabel checkout
    $insert_query = "INSERT INTO checkout (id_keranjang, id_user, id_pay, id_ongkir, id_obat, Alamat, jumlah, total_biaya,tanggal_checkout) 
                     VALUES ('$id_keranjang', '$id_user', '$payment_id', '$ongkir_id', '$id_obat_string', '$alamat', '$jumlah_string', '$total_biaya' ,'$tanggal_checkout')";
    // Lanjutan kode...

        if (mysqli_query($koneksi, $insert_query)) {
            // Ambil id_keranjang untuk pengguna saat ini
            $delete_keranjang = "DELETE FROM keranjang WHERE id_user = '$id_user'";
            if (mysqli_query($koneksi, $delete_keranjang)) {
                // Kurangi stok obat dengan jumlah yang dibeli
                foreach ($id_obat_array as $index => $id_obat) {
                    $jumlah = $jumlah_array[$index];
                    $query_stok = "UPDATE obat SET stok_obat = stok_obat - '$jumlah' WHERE id_obat = '$id_obat'";
                    if (!mysqli_query($koneksi, $query_stok)) {
                        mysqli_rollback($koneksi);
                        die("Gagal memperbarui stok obat: " . mysqli_error($koneksi));
                    }
                }

                // Komit transaksi
                mysqli_commit($koneksi);

                // Redirect ke halaman konfirmasi atau halaman lain yang diinginkan
                header('Location: thankyou.php');
                exit;
            } else {
                mysqli_rollback($koneksi);
                die("Gagal menghapus data dari keranjang: " . mysqli_error($koneksi));
            }
        } else {
            mysqli_rollback($koneksi);
            die("Gagal melakukan checkout: " . mysqli_error($koneksi));
        }
    }
}
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 75%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
            grid-column: span 2;
        }
        .cart-item {
            margin-bottom: 15px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .cart-item img {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }
        .form-group {
            margin-bottom: 15px;
            display: grid;
            grid-template-columns: 1fr;
        }
        .form-group label {
            text-align: right;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-top: 10px;
            grid-column: span 2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Checkout</h2>

    <?php
    // Jalankan ulang query untuk menampilkan item di keranjang belanja
    $result_keranjang = mysqli_query($koneksi, $query_keranjang);
    if (mysqli_num_rows($result_keranjang) > 0): ?>
        <div class="cart-items">
            <?php while ($row = mysqli_fetch_assoc($result_keranjang)): ?>
                <div class="cart-item">
                    <img src="foto/<?php echo $row['img']; ?>" alt="Gambar Obat">
                    <p><?php echo $row['nama_obat']; ?> Rp. <?php echo number_format($row['harga_obat']); ?> <br>
                    Anda membeli sebanyak <?php echo $row['jumlah']; ?> item <br>
                    Total harga = Rp <?php echo number_format($row['total_harga']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>Keranjang belanja Anda kosong.</p>
    <?php endif; ?>

    <form method="post">
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" required>
        </div>

        <div class="form-group">
            <label for="payment">Metode Pembayaran</label>
            <select id="payment" name="payment" required>
                <?php while ($row = mysqli_fetch_assoc($result_payment)): ?>
                    <option value="<?php echo $row['id_pay']; ?>"><?php echo $row['method']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="ongkir">Ongkos Kirim</label>
            <select id="ongkir" name="ongkir" required>
                <?php while ($row = mysqli_fetch_assoc($result_ongkir)): ?>
                    <option value="<?php echo $row['id_ongkir']; ?>"><?php echo $row['Jenis']; ?> - Rp <?php echo number_format($row['Harga_ongkir']); ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="button">Checkout</button>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </form>
</div>

</body>
</html>
