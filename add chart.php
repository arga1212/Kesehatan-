<?php

session_start();
//get id obat
 
$id_obat = $_GET['id'];

// jika sudah ada di keranjang +1
if(isset($_SESSION['keranjang'][$id_obat]))
{
    $_SESSION['keranjang'][$id_obat]+=1;
}

// jika belum =1
else 
{
 $_SESSION['keranjang'][$id_obat] =1;
}

//echo "<prev>";
//print_r($_SESSION);
//echo "</prev>";

//go cart

echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo  "<script>location='buy.php';</script>";
 ?>