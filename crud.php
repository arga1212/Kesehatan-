<?php
require 'function.php';

$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);
?>


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tabel</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%; 
            margin-right: 30px;
            margin-top: 30px;
            margin-bottom: 30px;


        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            border-color: #000;
            background-color: #fff;
            color: #000;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

            

        }
        th{
            background-color: #F8F4EC;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

        }

        body {
            background-color: #F8F4EC;
            color: #fff;

        }

.data {
   font-size:80px;
   text-align: center;
   color: #0C2D57;
   font-weight: bold;
   font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

}

a.add-user {
    display: inline-block;
    background: #0C2D57;
    border-radius: 20px;
    padding: 1.5%;
    color: #ffffff;
    cursor: pointer;
    font-weight: bold;
    font-size:20px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    float: right;
    margin-bottom: 25px;
    margin-right: 30px;
}

a.add-user:hover {
    background: #427D9D;
    text-decoration: none;
}

a.kembali 
{
    display: inline-block;
    background: #0C2D57;
    border-radius: 20px;
    padding: 1.5%;
    color: #ffffff;
    cursor: pointer;
    font-weight: bold;
    font-size:20px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    float: left;
    margin-bottom: 25px;
    margin-left: 30px;
}

a.kembali:hover  {
    background: #427D9D;
    text-decoration: none;
}

a.edit {
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-weight: bold;
    display: inline-block;
    padding: 5px 10px;
    background-color:#211C6A ; 
    color: white; 
    text-decoration: none;
    border-radius: 10px;
}

a.hapus {
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-weight: bold;
    display: inline-block;
    padding: 5px 10px;
    background-color: rgb(235, 71, 76); 
    color: white; 
    text-decoration: none;
    border-radius: 10px;
}


        
    </style>
</head>
<body>

<h1 class="data">Data Tabel User</h1>
<a href="add.php" class = "add-user">ADD USER</a> 


<table>
    <tr>
        <th>id_user</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Operation</th>

    </tr>

    <?php

     if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id_user"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td>";
            echo "<a class='edit'href='edit.php?id=".$row['id_user']."'>Edit</a> | ";
            echo "<a class='hapus'href='delete.php?id=".$row['id_user']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Tidak ada data yang ditemukan</td></tr>";
    }

  
    ?>
</table>

<a class = 'kembali' href="admin.php">Back</a>
<a href="add.php" class = "add-user">add user</a>   

</body>
</html>

<?php
mysqli_close($conn);
?>