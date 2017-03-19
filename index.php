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
		<h1>Сурат Тефтер</h1>
<?php
$linkKumBazata=mysqli_connect("localhost","root","");
mysqli_select_db($linkKumBazata,"mejdbaza");
$izvlichame =mysqli_query($linkKumBazata,'SELECT * 
                FROM users');


while ($row = mysqli_fetch_array($izvlichame)){

    echo "<div class='profile'>";

    echo " <a href='./sendMail.php?name=$row[user_id]'>";
    echo"<h2>$row[user_name]</h2>";
    echo"<img src='$row[snimkaLink]'alt=''>";
    echo " </a>";

           echo " <form action='./delete.php' method='post'>
                <button name='delete' value='$row[user_id]'>Изтрий</button>
            </form>";
    echo "</div>";
}


$selectmail =mysqli_query($linkKumBazata,'SELECT user_email
                FROM users');

while ($row = mysqli_fetch_array($selectmail)) {

    echo "$row[user_email] ";

}

?>
	</div>
</body>
