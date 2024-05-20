<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "kesehatan");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Ambil ID obat dari URL
$id_obat = $_GET['id'];

// Query untuk mendapatkan data obat berdasarkan ID
$query = "SELECT * FROM obat WHERE id_obat = $id_obat";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_obat = $_POST["nama_obat"];
    $stok_obat = $_POST["stok_obat"];
    $harga_obat = $_POST["harga_obat"];

    // Query untuk mengupdate data obat
    $query = "UPDATE obat SET nama_obat='$nama_obat', stok_obat='$stok_obat', harga_obat='$harga_obat' WHERE id_obat=$id_obat";

    if (mysqli_query($koneksi, $query)) {
        echo "Obat berhasil diperbarui.";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Obat</title>
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

        form {
            width: 50%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        form input[type="text"], form input[type="number"] {
            width: calc(100% - 20px);
            padding: 8px 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input[type="submit"] {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .button-back {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            background-color: #6c757d;
            text-align: center;
            margin-top: 20px;
        }

        .button-back:hover {
            background-color: #5a6268;
        }

        .center {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Edit Obat</h1>
    <form method="post" action="edit.php?id=<?php echo $id_obat; ?>">
        <label for="nama_obat">Nama Obat:</label>
        <input type="text" id="nama_obat" name="nama_obat" value="<?php echo $row['nama_obat']; ?>" required><br>

        <label for="stok_obat">Stok Obat:</label>
        <input type="number" id="stok_obat" name="stok_obat" value="<?php echo $row['stok_obat']; ?>" required><br>

        <label for="harga_obat">Harga Obat:</label>
        <input type="number" id="harga_obat" name="harga_obat" value="<?php echo $row['harga_obat']; ?>" required><br>

        <input type="submit" value="Update">
    </form>
    <div class="center">
        <a href="dataobat.php" class="button-back">Back</a>
    </div>
</body>
</html>
