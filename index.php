<?php

session_start();

if(isset($_SESSION["login"])) {
    header("location: login.php");
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kesehatan</title>
    <style>
    *{
    padding: 0;
    margin: 0;
}
body {
    margin: 0px;
    padding: 0px;
    font-family: 'Open Sans', sans-serif;
    width: 100%;
    
}

.wrapper {
    width:75%;
    margin: auto;
    position: relative;
}

.logo a {
    font-size: 50px;
    font-weight: 800;
    float: left;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #FFF6E9;
    text-decoration:none;
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
    background: #50C4ED;
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

section {
    margin: auto;
    display: flex;
    margin-bottom: 50px;
}

.text-box{
    margin-top: 50px;
    margin-bottom: 50px;
}

.text-box .deskripsi {
    font-size: 25px;
    font-weight: bold;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color: #352F44;
    margin-top: 60px;
}


.text-box h5 {
    font-family: 'comic sans ms';
    font-weight: 800;
    font-size: 20px;
    margin-bottom: 20px;
    margin-top: 20px;
    color: #352F44;
    width: 100%;
    line-height: 30px;
}

.text-box h3 {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-size: 30px;
}

.text-box p {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-weight: 800;
    font-size: medium;
}


.gambarsehat2 img {
    border-radius: 50px;
    padding: 5px;
    width: 55%;
    margin-left: 250px;
    margin-right: 40px;
    margin-top: 150px;
}

.gambarsehat2 {
    width: 1000px;
}

.gambarsehat img {
    border-radius: 40px;
    padding: 5px;
    width: 90%;
    margin-left: 1px;
    margin-right: 50px;
    margin-top: 80px;
}

.gambarsehat {
width: 1000px;
}

.text-box h2 {
    color: black;
    font-family: 'comic sans ms';
}

.text-box h1 {
    font-family: 'Times New Roman', Times, serif;
    color: black;
    margin-top: 58px;
}

a.tbl-biru {
    background: #092635;
    border-radius: 20px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #ffffff;
    cursor: pointer;
    font-weight: bold;
    margin-right: 10px;
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
    border-radius: 20px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #ffffff;
    cursor: pointer;
    font-weight: bold;
}

a.tbl-birubiru:hover {
    background: #AEDEFC;
    transition: ease-in;
    text-decoration: none;
}
p {
    margin: 10px 0px 10px 0px;
    padding: 10px 0px 10px 0px;
    color: black;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.tengah {
     text-align: center;
     width: 100%;
}

.tutor-list{
    width: 100%;
    position: relative;
    display: flex;
    flex-direction: row;
}

.kartu-tutor {
    width: 20%;
    margin: 0 auto;
}

.kartu-tutor img {
    width: 80%;
    border-radius: 50%;
    border: 1px solid #ddd;
    padding: 5px;
}

.partner-list {
    width: 100;
    position: relative;
    display: flex;
    flex-wrap: wrap;
}

.kartu-partner {
    width: 20%;
    margin: 0 auto;
}

.kartu-partner img {
    width: 80%;
    border-radius: 50%;
}

.kartu-partner p {
    font-family: 'comic sans ms';   
    font-weight: 500;
    font-size: 25px;
    color: #352F44;
}

.tbl-dokter {
    background: #3876BF;
    border-radius: 20px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #ffffff;
    cursor: pointer;
    font-weight: bold;
}

.tbl-dokter:hover {
    background: #AEDEFC;
    transition: ease-in;
    text-decoration: none;
}

footer {
    text-align: center;
    margin-top: 100px;
}

footer p {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    margin-top: 5px;
    font-weight: 600;
}

.text-box h2 {
    text-align: center;
}
.list{
    position: relative;
    z-index: 1;
    margin-top: 30px;
}

.list ul li{
    display: inline-block;
    margin-left: 30px;
    margin-top: 15px;
   
}

.grid{
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    width: 190px;
    height: 150px;
    background:#fff;
    border-radius: 3px;
    margin-right: 20px;
    margin-bottom: 20px;
    box-shadow: 0 0px 10px rgba(71,71,71,.2);
    -webkit-transition: .3s linear; 
    -moz-transition:.3s linear; 
    -ms-transition:.3s linear; 
    -o-transition:.3s linear;
    transition: .3s linear; 
}
.grid h5>a{ 
margin: 13px 0;
text-decoration: none;
margin-bottom: 20px;
font-size:12px;
font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
color: black;
}
.grid:last-child{margin-right: 30px;}
.grid:hover{
    color: #fff;
    background:#5356FF;
    box-shadow: 0 5px 10px rgba(71,71,71,.4);
}

.grid img{
width: 85%;
padding: auto;
margin-right: 30px;

}

.grid a{
    margin-left: 60px;
    margin-right: 50px;
    position: relative;
    
}

.welcome{
    display: block;
    position: relative;
}
.teks{
    margin-top: 60px;
    margin-left:70px
}
.teks h2{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
    margin-top:30px;
}

.teks p{
font-weight: normal;
margin-top: 20px;
font-size: 17px;
font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serifs;   
}

.foto img {
    border-radius: 30px;
    padding: 5px;
    width: 105%;
    margin-left: 0px;
    margin-right: 90px;
    margin-top: 0px;
    margin-bottom: 50px
}

.foto{
width: 500px;
float: right;
margin-right: 95px;
margin-bottom: px
}



.layanan{
    display: block;
    z-index: 1;
    margin-top: 80px;
    position: relative;
    margin-left: 250px;

}

.layanan ul li{
    display: inline-block;
    margin-left: 30px;
    margin-top: 15px;
   
}

.service{
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    width: 200px;
    height: 190px;
    background:#fff;
    border-radius: 3px;
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
.service: last-child{margin-right: 30px;}

.service:hover{
    color: #fff;
    background:#5356FF;
    box-shadow: 0 5px 10px rgba(71,71,71,.4);
}

.service img{
width: 85%;
padding: auto;
margin-right: 30px;

}

.service a{
    margin-left: 60px;
    margin-right: 50px;
    position: relative;
    
}

.tes h2{
text-align: center;
margin-top:100px;
}

.tes p{
    text-align:center;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}


    </style>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>Sehat aja</a></div>
                <div class="menu">
                    <ul>
                        <li><a href="#home">Why</a></li>
                        <li><a href="#courses">How</a></li>
                        <li><a href="#example">Example</a></li>
                        <li><a href="#partners">Partners</a></li>
                        <li><a href="biodata.php">About</a></li>
                        <li><a href="login.php" class="tbl-biru">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

<br>
<br>
<br>
    
<div class="foto">
      <img src="dokter.png">
     </div>
    <div class="welcome">
        <div class="teks">
    <h2>Solusi kesehatan terbaik untuk anda </h2>
    <p> Konsultasi dengan dokter terbaik sesuai yang anda butuhkan Dan 
        Pembelian obat semuanya bisa di sehat aja </p>
    
<section id="list-topics" class="list-topics">

			<div class="list">
					<ul>
						<li>

							<div class="grid">
                                <a href="dokter.php">
                                <img src="medical-team.png" alt="" srcset="">
                                </a>
								<h5><a href="#">Konsultasi dengan dokter anda</a></h5>

							</div>
						</li>
						<li>

							<div class="grid">
                                <a href="https://campus.quipper.com/aptitude_test">
                                <img src="healthcare.png" alt="" srcset="">
                                </a>
								<h5><a href="#">Mau beli obat ? Disini aja!</a></h5>

							</div>
						</li>
						<li>

							<div class="grid">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
						</li>

                        </ul>
</section>
                      
</div>
</div>

<br>

			
<section id="courses" class="courses">
<div class="layanan">
    <div class="tes">
    <h2>Layanan tambahan untuk anda</h2>
   <p>Beberapa tes yang bisa anda coba</p>
   </div>
    <ul>
        <li>
							<div class="service">
                                <a href="dokter.php">
                                <img src="medical-team.png" alt="" srcset="">
                                </a>
								<h5><a href="#">Konsultasi dengan dokter anda</a></h5>

							</div>
                            </li>

                            <li>
							<div class="service">
                                <a href="https://campus.quipper.com/aptitude_test">
                                <img src="healthcare.png" alt="" srcset="">
                                </a>
								<h5><a href="#">Mau beli obat ? Disini aja!</a></h5>

							</div>

                            </li>

                            <li>
							<div class="service">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
                            </li>
                            <li>
							<div class="service">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
                            </li>
                            
                            <br>

                            <li>
							<div class="service">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
                            </li>
                            <li>
							<div class="service">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
                            </li>
                            <li>
							<div class="service">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
                            </li>
                            <li>
							<div class="service">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
                            </li>
                           
                            </ul>
                           
                      
</div>
</section>


</body>
</html>