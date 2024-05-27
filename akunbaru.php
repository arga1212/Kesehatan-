<?php
require 'function.php';


if (isset($_POST['register'])) {
    if (registrasi($_POST) > 0 ) {
      echo "<script>
      alert('user berhasil di tambahkan')
      </script>";
    }
    else{
      echo mysqli_error($conn);
    }
  }
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regristrasi</title>
    
    <style>
       *{margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins , sans serif';

}

body {
    min-height: 100vh;
    width: 100%;
    background-color: #F8F4EC;
}

.container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 430px;
    width: 100%;
    background-color: #50C4ED;
    border-radius: 7px;
    box-shadow: 0px 5px 10px rgba(0,0,0,0, 3);

}

.container .registration {
    display: none;
}

#check:checked ~ .registration{
    display: block;
}

#check:checked ~ .login{
    display: block;
}

#check{
    display: none;
}

.container .form{
    padding: 2rem;
}

.form header {
    font-size: 2rem;
    font-weight: 500;
    text-align: center;
    margin-bottom: 1.5rem;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.form input {
    height: 60px;
    width: 100%;
    padding: 0 15px;
    font-size: 17px;
    margin-bottom: 1.3rem;
    border: 1px solid #ddd;
    border-radius: 6px;
    outline: none;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.form input:focus {
    box-shadow: 0 1px 0 rgba(0,0,0, 0.2);

}


.form input .button{
    color: #fff;
    background-color: #0C2D57;
    font-size: 1.2rem;
    font-weight: 500;
    letter-spacing: 1px;
    margin-top: 1.7rem;
    cursor: pointer;
    transition: 0.4s;
}

.form input .button:hover{
    background: #FFFF;
}  

.signup{
    font-size: 17px;
    text-align: center;
}

.signup label{
    color: black;
    cursor: pointer;
}

.signup label:hover {
    text-decoration: underline;
} 

.form a{
    font-size: 16px;
    color: white  ;
    text-decoration: none;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.form a:hover {
    text-decoration: underline;
    color: #F57D1F;
}

.backtologin {
    font-size: 17px;
    text-align: center;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}


    </style>
    
</head>
<body>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="form">
            <header>Ayo buat</header>
            <form action="" method="post">
                <input type="text" name="username" id="username" placeholder="Masukkan Nama Anda" required>
                <input type="text" name="email" id="email" placeholder="Masukkan email" required>
                <input type="password" name="password" id="password" placeholder="Masukkan password" required>
                <input type="submit" value="Register" class="button" name="register">  

            <div class="backtologin">
            <span class="backtologin"> lanjut login!
            <label for="check"><a href="login.php">Klik disini</label>

            </form>

            </div>
        </div>
     </div>


</body>
</html>