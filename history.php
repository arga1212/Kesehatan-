<?php
session_start();

// Lakukan koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "kesehatan");

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id_user'])) {
    // Jika belum, arahkan ke halaman login atau tindakan lain yang sesuai
    header("Location: login.php");
    exit();
}

// Ambil id_user dari sesi pengguna yang sedang login
$id_user = $_SESSION['id_user'];

// Buat query SQL untuk mengambil riwayat pembelian pengguna
$query = "SELECT * FROM pembelian WHERE id_user = '$id_user'";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian</title>
    <style>
        /* Tambahkan gaya CSS di sini sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
    width: 80%;
    margin: auto;
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.container:hover {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

.container img {
    width: 5%;
    height: 5%;
    float: left;
    margin-top: 70px;
    margin-left: -300px;
}

.history-item {
    width: 40%;
    padding: 20px;
    margin-bottom: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.history-item:hover {
    transform: scale(1.05);
}

        .history-item p {
            margin: 5px 0;
            margin-top: 10px;
        }
        .history-item hr {
            margin-top: 10px;
            margin-bottom: 10px;
            border: 0;
            border-top: 1px solid #ddd;
        }
        .back-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
            margin-top: 20px;
            cursor: pointer;
            width: 40%;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }

        h2{
            text-align: center;
        }
    </style>
</head>
<body>
<h2>Riwayat Pembelian, <?php echo $_SESSION['username']; ?></h2>
    <div class="container">
        <?php
        // Periksa apakah ada pembelian
        if (mysqli_num_rows($result) > 0) {
            // Jika ada, tampilkan data dalam bentuk item
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='history-item'>";
                echo "<p><strong>Tanggal Pembelian:</strong> " . $row['tanggal_pembelian'] . "</p>";
                echo "<p><strong>Nama Obat:</strong> " . $row['nama_obat'] . "</p>";
                echo "<p><strong>Jumlah:</strong> " . $row['qty'] . "</p>";
                echo "<p><strong>Total Harga:</strong> Rp " . number_format($row['total']) . "</p>";
                echo "<hr>";
                echo "</div>";
            }
        } else {
            // Jika tidak ada pembelian, tampilkan pesan kosong
            echo "<p>Belum ada riwayat pembelian.</p>";
        }
        ?>
        <!-- Tombol untuk kembali ke halaman buy.php -->
        <a href="buy.php" class="back-btn">Kembali ke Halaman Belanja</a>
    </div>
</body>
</html>
