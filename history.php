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

// Ambil ID pengguna dari sesi
$id_user = $_SESSION['id_user'];

// Query untuk mengambil riwayat pembelian beserta informasi yang diinginkan
$query_riwayat = "SELECT checkout.id_checkout, checkout.tanggal_checkout, checkout.total_biaya, obat.nama_obat, obat.harga_obat, checkout.jumlah, ongkir.Jenis AS jenis_ongkir, ongkir.Harga_ongkir, payment.method AS metode_pembayaran
                  FROM checkout
                  INNER JOIN obat ON checkout.id_obat = obat.id_obat
                  INNER JOIN ongkir ON checkout.id_ongkir = ongkir.id_ongkir
                  INNER JOIN payment ON checkout.id_pay = payment.id_pay
                  WHERE checkout.id_user = '$id_user'
                  ORDER BY checkout.tanggal_checkout DESC";

$result_riwayat = mysqli_query($koneksi, $query_riwayat);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            font-size: 18px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Riwayat Pembelian <?php echo $_SESSION['username']; ?></h1>

        <?php if (mysqli_num_rows($result_riwayat) > 0): ?>
            <table>
                <tr>
                    <th>Tanggal Pembelian</th>
                    <th>Nama Obat</th>
                    <th>Harga Obat</th>
                    <th>Jumlah</th>
                    <th>Total Biaya</th>
                    <th>Jenis Ongkir</th>
                    <th>Harga Ongkir</th>
                    <th>Metode Pembayaran</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result_riwayat)): ?>
                    <tr>
                        <td><?php echo $row['tanggal_checkout']; ?></td>
                        <td><?php echo $row['nama_obat']; ?></td>
                        <td>Rp <?php echo number_format($row['harga_obat']); ?></td>
                        <td><?php echo $row['jumlah']; ?></td>
                        <td>Rp <?php echo number_format($row['total_biaya']); ?></td>
                        <td><?php echo $row['jenis_ongkir']; ?></td>
                        <td>Rp <?php echo number_format($row['Harga_ongkir']); ?></td>
                        <td><?php echo $row['metode_pembayaran']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p class="no-data">Tidak ada riwayat pembelian.</p>
        <?php endif; ?>
    </div>
</body>
</html>
