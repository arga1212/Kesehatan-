<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter</title>
    <style>
 *{
    padding: 0;
    margin: 0;
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
    margin-right: 300px;
}

body {
    margin: 0px;
    padding: 0px;
    font-family: 'Open Sans', sans-serif;
    width: 100%;
    background-image: url('');
    background-size: cover;
    
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

.photo img {
    border-radius: 30px;
    padding: 5px;
    width: 105%;
    margin-left: 0px;
    margin-right: 90px;
    margin-top: 0px;
    margin-bottom: 50px;
    height: 700px;
}

.photo{
width: 500px;

float: left;
margin-right: 95px;
margin-bottom: px
}
    </style>
</head>
<body>

<nav>
        <div class="wrapper">
            <div class="logo"><a href=''>Sehat aja</a></div>
                <div class="menu">
                    <ul>
                        <li><a href="">Halaman Dokter</a></li>
                        <li><a href="login.php" class="tbl-biru">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>



    <div class="welcome">
        <div class="teks">
    <h2>Dokter dokter terbaik yang siap membantu anda</h2>
    <p> </p>
    
<section id="list-doctor" class="list-doctor">

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
						<li>

							<div class="grid">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
						</li>
						<li>

							<div class="grid">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
						</li>
						<li>

							<div class="grid">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
						</li>
						<li>

							<div class="grid">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
						</li>
						<li>

							<div class="grid">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
						</li>
						<li>

							<div class="grid">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
						</li>
						<li>

							<div class="grid">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
						</li>
						<li>

							<div class="grid">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

							</div>
						</li>
						<li>

							<div class="grid">
                               <a href="https://campus.quipper.com/aptitude_test"><img src="education.png"></a> 
								<h5><a href="https://campus.quipper.com/aptitude_test">Mental health test</a></h5>

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
</body>
</html>