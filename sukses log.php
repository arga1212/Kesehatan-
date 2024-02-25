<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sukses login</title>
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
    background-color: #F8F4EC;
    justify-content: center;
    height: 100vh;

}

nav {
    width: 100%;
    margin: auto;
    display: flex;
    line-height: 80px;
    position: sticky;
    position: -webkit-sticky;
    top: 0;
    background:  #FFB996 ;
    z-index: 1;
}


.logo a {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 40px;
    font-weight: bold;
    color: black;
    float: left;
    margin-left: 80px;
}

.opening {
    text-align: center;
    margin-top: 200px;
}

.opening h2 {
    font-family: 'Comic sans ms'; 
    font-weight: bold;
    font-style: normal;
    font-size: 40px;
    text-align: center;
}

a.tbl-opening {
    background: #FFCF81;
    border-radius: 20px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #ffffff;
    cursor: pointer;
    font-weight: bold;
    position: fixed;
    margin-left: 689px;
    margin-top: 40px;
}

a.tbl-opening:hover {
    background: #DDF2FD;
    text-decoration: none;
}


    </style>
</head>
<body>
    <nav>
    <div class="logo"> <a href=""> Sehat aja </a></div>
    </nav>
    
    <div class="opening">
        <h2>You have successfully logged in</h2>
    </div>

    <p><a href="index.php" target="_blank" class="tbl-opening">Back to home</a></p>  
    
</body>
</html>