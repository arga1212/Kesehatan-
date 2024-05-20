<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "kesehatan");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Fungsi untuk mendapatkan data pembelian berdasarkan ID
function getPembelianById($id_beli) {
    global $koneksi;
    $query = "SELECT * FROM pembelian WHERE id_beli = '$id_beli'";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

// Jika tombol Update diklik
if(isset($_POST["update"])) {
    $id_beli = $_POST["id_beli"];
    // Ambil data dari form
    // Anda dapat menambahkan kolom lain sesuai kebutuhan
    $nama_pembeli = $_POST["nama_pembeli"];
    $alamat = $_POST["alamat"];
    // Update data pembelian
    $query = "UPDATE pembelian SET nama_pembeli = '$nama_pembeli', Alamat = '$alamat' WHERE id_beli = '$id_beli'";
    if(mysqli_query($koneksi, $query)) {
        echo "Data pembelian berhasil diupdate.";
    } else {
        echo "Error: Gagal mengupdate data pembelian.";
    }
}

// Ambil ID pembelian dari parameter URL
$id_beli = $_GET["id_beli"];
// Dapatkan data pembelian berdasarkan ID
$dataPembelian = getPembelianById($id_beli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Update Pembelian</h1>
    <form method="post" action="">
        <input type="hidden" name="id_beli" value="<?php echo $dataPembelian['id_beli']; ?>">
        <label for="nama_pembeli">Nama Pembeli:</label>
        <input type="text" name="nama_pembeli" id="nama_pembeli" value="<?php echo $dataPembelian['nama_pembeli']; ?>">
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" value="<?php echo $dataPembelian['Alamat']; ?>">
        <input type="submit" name="update" value="Update Data">
    </form>
</body>
</html>
