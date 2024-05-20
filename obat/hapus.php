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

// Query untuk menghapus obat berdasarkan ID
$query = "DELETE FROM obat WHERE id_obat = $id_obat";

if (mysqli_query($koneksi, $query)) {
    echo "Obat berhasil dihapus.";
    header("Location: dataobat.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>
