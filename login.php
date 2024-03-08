<?php
session_start();
require 'function.php';

if(isset($_SESSION["email"])) {
    header("location: admin.php");
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // pengambilan data
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' " );

  // pengecekan username
  if(mysqli_num_rows($result) === 1 ){
    
    // pengecekan pass
    $row = mysqli_fetch_assoc($result);
    
    if ($password == $row["password"]) {
        $_SESSION['email']= $row['email'];
        $_SESSION['level']=$row['level'];
        
        if($row['level']== 'admin'){
            header("location: admin.php");
        }
        else {
            header("location: index.php");
        }
    } else {
        echo '<script> 
        alert("password atau email salah")
        </script>';
        exit;
    }
       
  }

  $eror = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
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
    background-color: #50C4ED ;
    border-radius: 7px;
    box-shadow: 0px 5px 10px rgba(0,0,0,0, 3);
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

.form label {
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
}

.form input:focus {
    box-shadow: 0 1px 0 rgba(0,0,0, 0.2);

}

.form a{
    font-size: 16px;
    color: white  ;
    text-decoration: none;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.form a:hover {
    text-decoration: underline;
}


.form input .button:hover{
    background: #40679E;
}  

.signup{
    font-size: 17px;
    text-align: center;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.signup label{
    color: black;
    cursor: pointer;
}

.signup label:hover {
    text-decoration: underline;
}

button[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        background-color: #0C2D57;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font color: #000000;
      }
</style>

</head>
<body>

<?php if( isset($eror) ) : ?>
<p style="color:000000; font style: italic font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; ali; text-align: center; 
margin-top: 80px;
 " >Username atau password salah</p>
<?php endif; ?>


    <div class="container">
        <input type="checkbox" id="check">
        <div class="form">
            <header>Ayo login</header>

<form action="" method="post">

<label for="username">Username</label>
<input type="text" id="username" name="username" >

<label for="email">Email</label>
<input type="email" id="email" name="email" required>

<label for="password">Password</label>
<input type="password" id="password" name="password" required>


<button type="submit" name="login">Login</button>

<div class="signup">
<span class="signup">Belum punya akun?
<label for="check"><a href="akunbaru.php">Daftar</label>
</span>
</a>
</div> </div>
</body>
</html>