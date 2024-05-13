<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "kesehatan");
// Query untuk mengambil data dari tabel obat
$query = "SELECT nama_obat, harga_obat, id_kat FROM obat";
$result = mysqli_query($koneksi, $query);
// Tutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .layanan {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        h2 {
            font-size: 24px;
            color: #333;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        
        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }
        
        .tbl-biru {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }
        
        .tbl-biru:hover {
            background-color: #0056b3;
        }
        
        .card {
            width: 200px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }
        
        .card h2 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }
        
        .card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="layanan">
    <h2>Berikut ini adalah obat yang tersedia di Sehat Aja!</h2>
    <p>Selamat Berbelanja</p>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card">';
        echo '<h2>' . $row['nama_obat'] . '</h2>';
        echo '<p>Harga: ' . $row['harga_obat'] . '</p>'; // hargaobat
        echo '<p>Katergori: ' . $row['id_kat'] . '</p>'; // hargaobat
        echo '<a href="payment.php" class="tbl-biru">Checkout</a>';
        echo '</div>';
    }
    ?>
</div>

</body>
</html>
