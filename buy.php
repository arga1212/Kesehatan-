<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "kesehatan");
// Query untuk mengambil data dari tabel obat
$query = "SELECT nama_obat, harga_obat FROM obat";
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



.tbl-biru {
    background: #092635;
    border-radius: 20px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #ffffff;
    cursor: pointer;
    font-weight: bold;
    margin-right: 10px;
    float: right;
    margin-bottom: 40px;
}

.tbl-biru:hover {
    background: #6AD4DD;
    text-decoration: none;
    transition: ease-in;
    -webkit-transition: .3s linear; 
    -moz-transition:.3s linear; 
    -ms-transition:.3s linear; 
    -o-transition:.3s linear;
    transition: .3s linear; 
}

.service{
    position: relative;
    display:inline-block;
    align-items: justify;
    flex-direction: column;
    flex-wrap: wrap;
    width: 300px; 
    height: 150px; 
    background: #fff;
    border-radius: 3px;
    box-shadow: 0 0px 10px rgba(71,71,71,.2);
    margin-right: 20px;
    margin-bottom: 20px;
    margin-top: 100px;
    box-shadow: 0 0px 10px rgba(71,71,71,.2);
    -webkit-transition: .3s linear; 
    -moz-transition:.3s linear; 
    -ms-transition:.3s linear; 
    -o-transition:.3s linear;
    transition: .3s linear; 
    
}
.service h5>a{ 
margin: 13px 0;
text-decoration: none;
margin-bottom: 20px;
font-size:12px;
font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
color: black;
}

.service:hover{
    background:#5356FF;
    box-shadow: 0 5px 10px rgba(71,71,71,.4);
}

.service img{
width: 17%;
margin-left: -60%;
margin-top: 40px;

}

.tes h2{
    text-align: center; 
}

.tes p {
    text-align: center;
}
.content {
            display: flex;
            flex-wrap: wrap;
        }


    </style>
</head>
<body>

<div class="tes">
<h2>Berikut ini adalah obat yang tersedia di Sehat Aja!</h2>
<p>Selamat Berbelanja</p>
</div>
<section class='content'> 
<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="service">';
    echo '<h2>' . $row['nama_obat'] . '</h2>';
    echo '<p>Harga: ' . $row['harga_obat'] . '</p>'; // hargaobat
    echo '<a href="login.php" class="tbl-biru">Login</a></li>';
}
?>
</div>
</section>



    
</body>
</html>