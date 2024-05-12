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
.layanan{
    display: block;
    z-index: 1;
    margin-top: 80px;
    position: relative;
   

}
.layanan ul li {
    display: grid;
    gap: 20px; /* Memberikan jarak antara elemen grid */
}

.card{
    display: inline-block;
    align-items: center;
    flex-direction: column;
    width: 300px; 
    height: 190px; 
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
    </style>
</head>
<body>

<div class="layanan">
<div class="tes">
<h2>Berikut ini adalah obat yang tersedia di Sehat Aja!</h2>
<p>Selamat Berbelanja</p>
</div>
<ul>
<li>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    // Tampilkan data event di dalam div dengan class "card"
    echo '<div class="card">';
    echo '<h2>' . $row['nama_obat'] . '</h2>'; // Nama event
    echo '<hr size="3px" width="70%" align="left" color="black">';
    echo '<p>Harga: ' . $row['harga_obat'] . '</p>'; // hargaobat
    '</div>';
}

?>


</div>
</li>


    
</body>
</html>