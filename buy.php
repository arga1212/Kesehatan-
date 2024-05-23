<?php
session_start();

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "kesehatan");
// Query untuk mengambil data dari tabel obat
$query ="SELECT 
obat.id_obat,
obat.nama_obat,
obat.stok_obat,
obat.harga_obat,
kategori.nama_kat
FROM 
obat
INNER JOIN 
kategori ON obat.id_kat = kategori.id_kat";
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

.layanan {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        h2 {
            font-size: 24px;
            margin-top: 20px;
            margin-bottom: 10px;
            font-family: "Montserrat", sans-serif;
            color: #005EB2 ; 
        }
        
        p {
            font-size: 16px;
            font-family: "Montserrat", sans-serif;
            color: black;
            margin-bottom: 20px;
            font-weight: 600;
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
        
        .tbl-biru2 {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
            margin-left: 700px;
        }
        
        .tbl-biru2:hover {
            background-color: #0056b3;
        }
        
        .card {
display: inline-block;
width: 300px;
background-color: #fff;
border-radius: 5px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
padding: 20px;
margin-bottom: 20px;
margin-right: 50px;
        }
        
        .card:hover {
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
transform: translateY(-5px);
        }
        
        .card h2 {
font-size: 18px;
margin-bottom: 10px;
font-family: "Montserrat", sans-serif;
color: #005EB2 ; 
        }
        
        .card p {
            font-size: 14px;
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            color: #666;
            margin-bottom: 20px;
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
                        <li><a href="checkout.php">Checkout</a></li>
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

<div class="layanan">
    <h2>Berikut ini adalah obat yang tersedia di Sehat Aja!</h2>
    <p>Selamat Berbelanja</p>


    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

    <div class="card">
        <h2> <?php echo $row['nama_obat']; ?></h2>
        <p> Harga: <?php echo number_format( $row['harga_obat']); ?></p>
        <p> kategori: <?php echo $row['nama_kat']; ?></p>
        <a href="add chart.php?id=<?php echo $row['id_obat'];?>"class= "tbl-biru">add cart</a>

    </div>

<?php } ?>
</div>

<a href="logout.php" class="tbl-biru2">Logut</a>

</body>
</html>
