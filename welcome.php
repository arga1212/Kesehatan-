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
* { 
    text-decoration: none;
    margin: 0px;
    padding: 0px;
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
    z-index: 1;
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
    background: #0C2D57;
    border-radius: 20px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #ffffff;
    cursor: pointer;
    font-weight: bold;
    margin-right: 10px;
}

a.tbl-biru:hover {
    background: #427D9D;
    text-decoration: none;
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
                        <li><a href="login.php" class="tbl-biru">Sign up</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <!--untuk home-->
        <section id="home">
        <div  class="gambarsehat">
        <img src="kesehatan.jpg"/>
        </div>
            <div class="text-box">
                <p class="deskripsi">Kenapa perlu belajar menjaga kesehatan??</p>
                <h5>Menjaga kesehatan tentu saja merupakan hal yang sangat penting bagi tubuh</h5>
                <p>Dengan menjaga kesehatan maka tubuh otomatis tubuh kita akan terasa lebih segar dan bugar dalam menjalani aktivitas setiap hari nya, Dan juga bagi kita para siswa tentu saja akan sangat menguntungkan jika kita selalu menjaga kesehatan 
                    kita akan menjadi fokus untuk belajar dan tidak meninggalkan materi yang ada disekolah
                </p>
                <p><a href="https://rsud.kulonprogokab.go.id/detil/190/jaga-kesehatan-dan-kebugaran-tubuh#:~:text=Menjaga%20kesehatan%20dan%20kebugaran%20tubuh,tetap%20menjalankan%20aktifitas%20sehari%2Dhari." target="_blank" class="tbl-birubiru">Pelajari lebih lanjut</a></p>    
            </div>
        </section>

        <hr>

        <!--Untuk Courses-->
        <section id="courses">
            <div class="text-box">
                <h1>Bagaimana caranya menjaga kesehatan yang baik dan benar??</h1>
                <br>
                <h3>Do you know?</h3> 
                <p>Dilansir dari halodoc, ada 5 cara sederhana untuk menjaga kesehatan diantranya: </p>
                <p>1. Makan yang teratur dan cukup tidak berlebihan dan tidak kekurangan</p>
                <p>2. Istirahat cukup</p>
                <p>3. Olahraga rutin</p>
                <p>4. Bermeditasi dengan tujuan menenangkan pikiran</p>
                <p>5. Memiliki sikap positif</p>
                <p><a href="https://www.halodoc.com/artikel/5-cara-sederhana-untuk-menjaga-kesehatan" class="tbl-birubiru">Pelajari lebih lanjut</a></p>
            </div>
            <div class="gambarsehat2"  >
            <img src="kesehatan2.jpg"/>
            </div>

        </section>

        <hr>

        <!--untuk example-->
        <section id="example">
            <div class="tengah">
                <div class="text-box">
                    <p class="deskripsi">Contoh kegiatan untuk menjaga kesehatan</p>
                    <h2> Example</h2>
                    <p>Beberapa contoh kegiatan</p>
                </div>

                <div class="tutor-list">
                      <div class="kartu-tutor">
                        <img src="https://img.freepik.com/free-photo/flat-lay-batch-cooking-composition_23-2148765597.jpg?w=1060&t=st=1693324640~exp=1693325240~hmac=041f04aba07ce6847681d0f4a0dae5debd517761d72388e62abc465efec91911"/>
                        <p>Makan yang cukup dan bergizi</p>
                      </div>

                      <div class="kartu-tutor">
                        <img src="https://img.freepik.com/free-vector/sleep-analysis-concept-illustration_114360-6818.jpg?size=626&ext=jpg&uid=R125519887&ga=GA1.1.300703531.1693283522&semt=sph"/>
                      <p> Istirahat cukup </p>
                    </div>


                      <div class="kartu-tutor">
                        <img src="https://img.freepik.com/free-photo/sports-tools_53876-138077.jpg?size=626&ext=jpg&uid=R125519887&ga=GA1.1.300703531.1693283522&semt=sph"/>
                    <p>Olahraga</p>
                    </div>


                      <div class="kartu-tutor">
                        <img src="https://img.freepik.com/free-vector/person-keeping-social-distance-avoiding-contact-woman-separating-from-crowd-meditating-transparent-bubble_74855-11009.jpg?size=626&ext=jpg&uid=R125519887&ga=GA1.1.300703531.1693283522&semt=sph"/>
                      <p>Bermeditasi untuk menenangkan pikiran</p>
                    </div>

                    <div class="kartu-tutor">
                        <img src="https://img.freepik.com/free-vector/public-approval-concept-illustration_52683-32169.jpg?size=626&ext=jpg&uid=R125519887&ga=GA1.1.300703531.1693283522&semt=ais"/>
                      <p>Bersikap positif</p>
                    </div>
            </div>

            <hr> 

        </section>

        <!--untuk partners-->
        <div class="tengah">
            <section id="partners">
                <div class="text-box">
                    <p class="deskripsi">Our partners</p>
                    <h5>This is our top partners</h5>
                    <p> You can call them when you need something
                    </p>
         
            <div class="partner-list">
                <div class="kartu-partner">
                  <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcREa8iWL-chl4bXzv_h7Z3iqjK4SrPOfc1mvKlzMJW_RaK3KYqr"/>
                  <p> DR.Reisa</p>
                  <p><a href="" target="_blank" class="tbl-dokter">Click here</a></p>   

                </div>

                <div class="kartu-partner">
                  <img src="https://www.qoala.app/id/blog/wp-content/uploads/2020/12/dr-Richard-Lee-Biodata-Biografi-dan-Fakta-Terkini-Dokter-Kecantikan-Pemilik-Klinik-Athena.jpg"/>
                  <p> DR.Richard Lee</p>
                  <p><a href="" target="_blank" class="tbl-dokter">Click here</a></p>   
                </div>
            </div>
        </div>
    </div>
</section>
    

<footer>
        <p>@Copyright2023ArgaSIJA1</p>
</footer>

</body>
</html>