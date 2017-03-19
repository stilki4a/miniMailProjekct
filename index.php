<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <title>Surat Tefter</title>
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
    <button><a href="./login.php">ADD</a></button>

</head>
<body>
	<div id="wrrap">
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
    //echo " <a href='./index.php?name=$row[id_user]'>
           echo " <form action='./delete.php' method='post' name='dell'>
                <button name='delete' value='$row[id_user]'>Изтрий</button>
            </form>";
    // </a>";

    echo "</div>";
}
?>
	</div>
</body>