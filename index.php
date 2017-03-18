
    <title>tupaci</title>
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
    <button><a href="./login.php">ADD</a></button>


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
                <button name='delete' value='$row[user_id]'>Мани го тоя/тая</button>
            </form>";
    echo "</div>";
}
?>