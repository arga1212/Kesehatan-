<?php

session_start();
$koneksi = mysqli_connect("localhost", "username", "password", "kesehatan");    

if(empty($_SESSION["keranjang"])  OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('Keranjang kosong nih, Belanja dulu yuk!');</script>";
echo  "<script>location='buy.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Obat</title>
   <style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
    margin: 0;
            padding: 0;
}

.wrapper {
    width:75%;
    margin: auto;
    position: relative;
}

.logo a {
    font-family: "Montserrat", sans-serif;
    font-size: 30px;
    font-weight: 700;
    float: left;
    color:#002D73;
    text-decoration:none;
    margin-left: -100px;
}

.menu {
    float: right;
}

nav {
    width: 100%;
    margin: auto;
    display: flex;
    line-height: 80px;
    position: sticky;
    position: -webkit-sticky;
    top: 0;
    background: #AED6F1;
    z-index: 1000;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

nav ul li {
    float: left;
}

nav ul li a {
    color:#211C6A;
    font-weight: bold;
    text-align: center;
    padding: 0px 16px 0px 16px;
    text-decoration: none;
}

nav ul li a:hover {
    text-decoration: underline;
}

.halo {
    font-weight: bold;
    float: right;
    margin-left: 20px;
    font-family: "Montserrat", sans-serif;
    color:
}


h1 {
    text-align: center;
}

table {
    width: 80%;
    border-collapse: collapse;
    margin-top: 20px;
    margin-left: 120px;
}

table, th, td {
    border: 1px solid #ddd;
    height: 40px;
}

th, td {
    padding: 8px;
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

a.tbl-biru {
    background: #092635;
    border-radius: 10px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #ffffff;
    cursor: pointer;
    font-weight: bold;
    margin-right: 50C4EDpx;
    width: 100px;
    height: 90px;
    margin-right: 30px;
    text-decoration: none;
    margin-left: 120px;
}

a.tbl-biru:hover {
    background: #6AD4DD;
    text-decoration: none;
    transition: ease-in;
    -webkit-transition: .3s linear; 
    -moz-transition:.3s linear; 
    -ms-transition:.3s linear; 
    -o-transition:.3s linear;
    transition: .3s linear; 
}

a.tbl-birubiru {
    background: #0174BE;
    border-radius: 10px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #ffffff;
    cursor: pointer;
    font-weight: bold;
    margin-right: 10px;
    width: 100px;
    height: 90px;
    margin-right: 30px;
    text-decoration: none;
   
    
}

a.tbl-birubiru:hover {
    background: #AEDEFC;
    transition: ease-in;
    text-decoration: none;
}

.button{
    margin-right: 60px;
}

.btnhapus{
    background: #0174BE;
    border-radius: 10px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #ffffff;
    cursor: pointer;
    font-weight: bold;
    width: 10px;
    height: 90px;
    align: center;
    text-decoration: none;
    font-size: 10px;


}

.btnhapus:hover{
    background: #AEDEFC;
    transition: ease-in;
    text-decoration: none;
}

   </style>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo">
                <a href=''>Sehat aja</a></div>
                <div class="menu">
                    <ul>
                        <li><a href="selamat-datang.php">Home</a></li>
                        <li><a href="#courses">Checkout</a></li>
                        <li><a href="cart.php">Keranjang</a></li>
                       <?php
                        echo '<div class="halo">' . "Halo,". $_SESSION['username'] .'</div>';
                        ?>
                        
                        
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>




    <h1>Keranjang Belanja</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Harga Obat</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody>
        <?php  $nomor=1; ?>

        <?php  foreach ($_SESSION["keranjang"] as $id_obat =>$jumlah):   ?>
            <!-- show data sesuai yang ada di keranjang sesuai id_obat -->
        <?php
            $ambil = $koneksi->query("SELECT * FROM obat WHERE id_obat ='$id_obat'");
            $pecah = $ambil->fetch_assoc();
            $total = $pecah["harga_obat"] * $jumlah;
        ?>        
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah["nama_obat"]; ?></td>
                <td><?php echo $pecah["harga_obat"]; ?></td>
                <td><?php echo $jumlah; ?></td>
                <td>Rp. <?php echo number_format($total); ?></td>
                <td>
                <a href="hapuscart.php?id=<?php echo $id_obat;?>" class="btnhapus">Cancel</a>
                </td>
         </tr>
         <?php $nomor++; ?>
         <?php endforeach ?>;   
        </tbody>
    </table>
    <br>
    <br>
    <br> 
    <br>
    <div class="button">
    <a href="buy.php" class="tbl-biru">Lanjut Belanja</a>
    <a href="checkout.php" class="tbl-birubiru">Checkout</a> 
    </div>
</body>
</html>

