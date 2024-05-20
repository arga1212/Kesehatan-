<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "kesehatan");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Fungsi untuk mendapatkan data pembelian
function getPembelianData() {
    global $koneksi;
    $query = "SELECT * FROM pembelian";
    $result = mysqli_query($koneksi, $query);
    return $result;
}

// Jika tombol Delete diklik
if(isset($_POST["delete"])) {
    $id_beli = $_POST["id_beli"];
    $query = "DELETE FROM pembelian WHERE id_beli = '$id_beli'";
    if(mysqli_query($koneksi, $query)) {
        echo "Pembelian berhasil dihapus.";
        // Redirect atau refresh halaman agar data terupdate
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "Error: Gagal menghapus pembelian.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Pembelian</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        form {
            display: inline-block;
        }

        form input[type="submit"] {
            padding: 6px 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h1>CRUD Pembelian</h1>

    <!-- Tabel untuk menampilkan data pembelian -->
    <table>
        <tr>
            <th>ID Pembelian</th>
            <th>ID User</th>
            <th>ID Obat</th>
            <th>ID Ongkir</th>
            <th>ID Payment</th>
            <th>Nama Pembeli</th>
            <th>Alamat</th>
            <th>Nama Obat</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Payment</th>
            <th>Jenis</th>
            <th>Harga Ongkir</th>
            <th>Tanggal Pembelian</th>
            <th>Aksi</th>
        </tr>
        <?php
        // Ambil data pembelian dari database
        $dataPembelian = getPembelianData();

        // Loop through each row in data pembelian and display it in table row
        while ($row = mysqli_fetch_assoc($dataPembelian)) {
            echo "<tr>";
            echo "<td>" . $row['id_beli'] . "</td>";
            echo "<td>" . $row['id_user'] . "</td>";
            echo "<td>" . $row['id_obat'] . "</td>";
            echo "<td>" . $row['id_ongkir'] . "</td>";
            echo "<td>" . $row['id_pay'] . "</td>";
            echo "<td>" . $row['nama_pembeli'] . "</td>";
            echo "<td>" . $row['Alamat'] . "</td>";
            echo "<td>" . $row['nama_obat'] . "</td>";
            echo "<td>" . $row['harga'] . "</td>";
            echo "<td>" . $row['qty'] . "</td>";
            echo "<td>" . $row['total'] . "</td>";
            echo "<td>" . $row['payment'] . "</td>";
            echo "<td>" . $row['Jenis'] . "</td>";
            echo "<td>" . $row['Harga_ongkir'] . "</td>";
            echo "<td>" . $row['tanggal_pembelian'] . "</td>";
            echo "<td>";
            echo "<form method='post' action='update.php'>";
            echo "<input type='hidden' name='id_beli' value='" . $row['id_beli'] . "'>";
            echo "<input type='submit' name='update' value='Update'>";
            echo "</form>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='id_beli' value='" . $row['id_beli'] . "'>";
            echo "<input type='submit' name='delete' value='Delete'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
