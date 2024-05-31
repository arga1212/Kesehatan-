<?php
session_start();

if (!isset($_SESSION['level']) || $_SESSION['level'] !== 'user') {
    header('Location: index.php');
    exit;
}

if (!isset($_GET['id_obat']) || !isset($_GET['jumlah'])) {
    header('Location: index.php');
    exit;
}

$id_user = $_SESSION['id_user'];
$id_obat = $_GET['id_obat'];
$jumlah = $_GET['jumlah'];

$koneksi = mysqli_connect("localhost", "username", "password", "kesehatan");

$query_obat = "SELECT harga_obat FROM obat WHERE id_obat = '$id_obat'";
$result_obat = mysqli_query($koneksi, $query_obat);

if ($result_obat && mysqli_num_rows($result_obat) > 0) {
    $row_obat = mysqli_fetch_assoc($result_obat);
    $harga_obat = $row_obat['harga_obat'];
    $total_harga = $harga_obat * $jumlah;

    $query_check = "SELECT * FROM keranjang WHERE id_user = '$id_user' AND id_obat = '$id_obat'";
    $result_check = mysqli_query($koneksi, $query_check);

    if ($result_check && mysqli_num_rows($result_check) > 0) {
        $query_update = "UPDATE keranjang SET jumlah = jumlah + $jumlah, total_harga = jumlah * '$harga_obat' WHERE id_user = '$id_user' AND id_obat = '$id_obat'";
        mysqli_query($koneksi, $query_update);
    } else {
        $query_insert = "INSERT INTO keranjang (id_user, id_obat, jumlah, total_harga) VALUES ('$id_user', '$id_obat', '$jumlah', '$total_harga')";
        mysqli_query($koneksi, $query_insert);
    }
}

mysqli_close($koneksi);
header('Location: cart.php');
exit;
?>
