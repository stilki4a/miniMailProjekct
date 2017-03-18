
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

    echo " <a href='./sendMail.php?name=$row[id_user]'>";
    echo"<h2>$row[name]</h2>";
    echo"<img src='$row[snimkaLink]'alt=''>";
    echo " </a>";
    //echo " <a href='./index.php?name=$row[id_user]'>
           echo " <form action='./delete.php' method='post'>
                <button name='delete' value='$row[id_user]'>Мани го тоя/тая</button>
            </form>";
    // </a>";

    echo "</div>";
}
?>