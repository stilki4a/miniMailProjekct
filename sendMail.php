<?php

if (isset($_GET['name'])) {
    $id = $_GET['name'];


    $ime ="";
    $email ="";
    $status = "";
    $snimka="";

    $linkKumBazata = mysqli_connect("localhost", "root", "");
    mysqli_select_db($linkKumBazata, "mejdbaza");
    $izvlichame = mysqli_query($linkKumBazata,
                    "SELECT *
                    FROM users
                    WHERE user_id='$id'
                    ");

//    while ($row = mysqli_fetch_array($izvlichame)) {
//        echo "<div >";
//       echo "<h2>$row[name]</h2>";
//        echo "<img src='$row[snimkaLink]'alt=''>";
//       echo " </a>";echo "</div>";
//   }

    while ($row = mysqli_fetch_array($izvlichame)) {


//        echo "<img src='$row[snimkaLink]'alt=''>";
//        echo "<h2>$row[name]</h2>";
        $ime = $row['user_name'];
        $email = $row['user_email'];
        $status = $row['user_status'];
        $snimka=$row['snimkaLink'];

    }
//    echo $ime."<br/>".$email."<br/>".$status."<br/>"."<img src=\"$snimka\" alt=\"\">";

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
</head>
<body>
    <div id="wrraper">

        <input type="button" value="BACK" ONCLICK="history.back(-1)">
        <h1>Свържете се с мен</h1>
        <div id="infoUser">
             <div class="up">
                 <img src="<?=$snimka?>" alt="pik" >
             </div>
             <div class="up">
              <p>Име: <?=$ime?></p>
                <p>Статус: <?=$status?></p>
               <p>Имейл: <?=$email?></p>

             </div>
        </div>
        <div id="mail">
                <form action="<?php $_SERVER['PHP_SELF']?>" method="post">


                <label for="from"> ОТ: </label>
                <input type="text" name="from" id="from">
                <br/>
                <label for="to"> ДО: </label>
                <input type="text" name="to" id="to">
                <br/>
                <label for="subject"> Тема: </label>
                <input type="text" name="syb" id="subject">
                    <br/>
                <label for="message">Съобщение:</label>
                    <textarea type="text" name="message" id="message"></textarea>
                <br/>



                <br/>
                <input type="submit" id="upload" name="submit" value="ИЗПРАТИ" >

            </form>
        </div>
    </div>

</body>
</html>
