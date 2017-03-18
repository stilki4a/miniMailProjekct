<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tupaci</title>
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
</head>
<body>
    <button><a href="./login.php">ADD</a></button>
</body>
</html>

<?php
$linkKumBazata=mysqli_connect("localhost","root","");
mysqli_select_db($linkKumBazata,"mejdbaza");
$izvlichame =mysqli_query($linkKumBazata,'SELECT * 
                FROM users');





while ($row = mysqli_fetch_array($izvlichame)){

    echo "<div class='profile'>";

    echo " <a href='./sendMail.php?name=$row[id_user]'>";
    echo"<h2>$row[name]</h2>";
    echo"<img src='$row[snimkaLink]'alt=''>";
    echo " </a>";
    echo "</div>";
}


?>