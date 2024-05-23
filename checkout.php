<?php
$koneksi = mysqli_connect("localhost", "username", "password", "kesehatan");
session_start();


if(empty($_SESSION["keranjang"])  OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('Masih kosong nih, Belanja dulu yuk!');</script>";
echo  "<script>location='buy.php';</script>";
}

if (isset($_POST["checkout"])) {
    $id_ongkir = $_POST["pengiriman"];
    $id_pay = $_POST["payment"];
    $id_user = $_SESSION['id_user'];
    $nama_pembeli = $_SESSION["username"];
    $alamat = $_POST["Alamat"];
    $tanggal_pembelian = date("Y-m-d");

    $totalbelanja = 0;

    // Get shipping information
    $njupuk = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
    $arrayongkir = $njupuk->fetch_assoc();
    $tarif = $arrayongkir['Harga_ongkir'];
    $ongkir = $arrayongkir['Jenis'];

    // Loop through each item in the cart and insert into the database
    foreach ($_SESSION["keranjang"] as $id_obat => $jumlah) {
        $ambil = $koneksi->query("SELECT * FROM obat WHERE id_obat ='$id_obat'");
        $pecah = $ambil->fetch_assoc();
        $total = $pecah["harga_obat"] * $jumlah;
        $totalbelanja += $total;

        $nama_obat = $pecah["nama_obat"];
        $harga = $pecah["harga_obat"];
        $qty = $jumlah;

        $query_insert = "INSERT INTO pembelian (id_user, id_obat, id_ongkir, id_pay, nama_pembeli, Alamat, nama_obat, harga, qty, total, payment, Jenis, Harga_ongkir, tanggal_pembelian)
        VALUES ('$id_user', '$id_obat', '$id_ongkir', '$id_pay', '$nama_pembeli', '$alamat', '$nama_obat', '$harga', '$qty', '$total', '$id_pay', '$ongkir', '$tarif', '$tanggal_pembelian')";

        if (!mysqli_query($koneksi, $query_insert)) {
            echo "Error: " . $query_insert . "<br>" . mysqli_error($koneksi);
            // Exit the loop and do not continue with the rest of the items
            break;
        }
    }

    $total_pembelian = $totalbelanja + $tarif;

        echo "<script>
            alert('Pembayaran berhasil');
            window.location.href = 'thankyou.php';
            </script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .wrapper {
            width: 75%;
            margin: auto;
            position: relative;
        }
        .logo a {
            font-family: "Montserrat", sans-serif;
            font-size: 30px;
            font-weight: 700;
            float: left;
            color: #002D73;
            text-decoration: none;
            margin-left: -100px;
        }
        .menu {
            float: right;
        }
        nav {
            width: 100%;
            display: flex;
            line-height: 80px;
            position: sticky;
            top: 0;
            background: #AED6F1;
            z-index: 1000;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            float: left;
        }
        nav ul li a {
            color: #211C6A;
            font-weight: bold;
            padding: 0 16px;
            text-decoration: none;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        .halo {
            font-weight: bold;
            float: right;
            margin-left: 20px;
            font-family: "Montserrat", sans-serif;
            color: #002D73;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
        }
        table, th, td {
            border: 1px solid #ddd;
            height: 40px;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .tbl-biru, .tbl-birubiru {
            display: inline-block;
            border-radius: 10px;
            margin-top: 20px;
            padding: 15px 20px;
            color: #ffffff;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            margin-left: 10px;
        }
        .tbl-biru {
            background: #092635;
        }
        .tbl-biru:hover {
            background: #6AD4DD;
            transition: .3s linear;
        }
        .tbl-birubiru {
            background: #0174BE;
        }
        .tbl-birubiru:hover {
            background: #AEDEFC;
            transition: .3s linear;
        }
        .button {
            text-align: center;
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            width: 80%;
            margin: 0 auto;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-container {
            margin-top: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo">
                <a href=''>Sehat aja</a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="selamat-datang.php">Home</a></li>
                    <li><a href="#courses">Checkout</a></li>
                    <li><a href="cart.php">Keranjang</a></li>
                    <?php
                    echo '<div class="halo">' . "Halo,". $_SESSION['username'] .'</div>';
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <h1>Checkout Yuk</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Harga Obat</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
        <?php  $nomor=1; ?>
        <?php $totalbelanja =0;?>

        <?php  foreach ($_SESSION["keranjang"] as $id_obat =>$jumlah):   ?>
            <!-- show data sesuai yang ada di keranjang sesuai id_obat -->
            <?php
            $ambil = $koneksi->query("SELECT * FROM obat WHERE id_obat ='$id_obat'");
            $pecah = $ambil->fetch_assoc();
            $total = $pecah["harga_obat"] * $jumlah;
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah["nama_obat"]; ?></td>
                <td><?php echo $pecah["harga_obat"]; ?></td>
                <td><?php echo $jumlah; ?></td>
                <td><?php echo number_format($total); ?></td>
            </tr>
            <?php $nomor++; ?>
            <?php $totalbelanja+=$total;?>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Total Belanja</th>
                <th>Rp. <?php  echo number_format($totalbelanja); ?> </th>
            </tr>
        </tfoot>
    </table>
    <form method="post">
    <div class="form-container">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" readonly value="<?php echo $_SESSION['username']; ?>">
            </div>
            <div class="form-group">
              <label for="Alamat">Alamat</label>
            <input type="text" id="Alamat" name="Alamat" required>
         </div>

            <div class="form-group">
    <label for="pengiriman">Pilih Pengiriman</label>
    <select id="pengiriman" name="pengiriman">
        <option value="">Pilih Pengiriman</option>
        <?php 
        $take = $koneksi->query("SELECT * FROM ongkir");
        while ($perongkir = $take->fetch_assoc()) {
        ?>
        <option value="<?php echo $perongkir['id_ongkir']; ?>">
            <?php echo $perongkir['Jenis']; ?> - Rp. <?php echo number_format($perongkir['Harga_ongkir']); ?>
        </option>
        <?php } ?>
    </select>
</div>

<div class="form-group">
    <label for="payment">Pilih Metode Pembayaran</label>
    <select id="payment" name="payment">
        <?php 
        $jupuk = $koneksi->query("SELECT * FROM payment");
        while ($methodpay = $jupuk->fetch_assoc()) {
        ?>
        <option value="<?php echo $methodpay['id_pay']; ?>">
            <?php echo $methodpay['method']; ?>
        </option>
        <?php } ?>
    </select>
</div>

            <div class="button">
                <a href="buy.php" class="tbl-biru">Lanjut Belanja</a>
                <button type="submit" name="checkout" class="tbl-birubiru">Checkout</button>
            </div>
        </form>

    </div>

</body>
</html>
