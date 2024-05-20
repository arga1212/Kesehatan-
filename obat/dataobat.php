<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "kesehatan");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Query untuk mendapatkan daftar obat
$query = "SELECT * FROM obat";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Obat</title>
    <link rel="stylesheet" href="style.css">
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
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
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

        .button, .button-edit, .button-delete, .button-add, .button-back {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            margin: 5px;
        }

        .button {
            background-color: #007BFF;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .button-edit {
            background-color: #28a745;
        }

        .button-edit:hover {
            background-color: #218838;
        }

        .button-delete {
            background-color: #dc3545;
        }

        .button-delete:hover {
            background-color: #c82333;
        }

        .button-add {
            background-color: #17a2b8;
        }

        .button-add:hover {
            background-color: #138496;
        }

        .button-back {
            background-color: #6c757d;
        }

        .button-back:hover {
            background-color: #5a6268;
        }

        .action-buttons {
            display: flex;
            justify-content: space-around;
        }

        .center {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Daftar Obat</h1>
    <table>
        <tr>
            <th>Nama Obat</th>
            <th>Stok Obat</th>
            <th>Harga Obat</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['nama_obat']; ?></td>
                <td><?php echo $row['stok_obat']; ?></td>
                <td><?php echo $row['harga_obat']; ?></td>
                <td class="action-buttons">
                    <a href="edit.php?id=<?php echo $row['id_obat']; ?>" class="button-edit">Edit</a>
                    <a href="hapus.php?id=<?php echo $row['id_obat']; ?>" class="button-delete" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <div class="center">
        <a href="tambah.php" class="button-add">Tambah Obat Baru</a>
        <a href="../admin.php" class="button-back">Kembali</a>
    </div>
</body>
</html>
