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


    while ($row = mysqli_fetch_array($izvlichame)) {



        $ime = $row['user_name'];
        $email = $row['user_email'];
        $status = $row['user_status'];
        $snimka=$row['snimkaLink'];

    }
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

        <input type="button" value="BACK" ONCLICK="history.back(-1)" id="back">
        <h1 id="men">Свържете се с мен</h1>
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

			<div class="mess" >
                <label for="from" class="label"> ОТ: </label>
                <input type="text" name="from" id="from">
              </div >
              <div class="mess">
                <label for="to" class="label"> ДО: </label>
                <input type="text" name="to" id="to">
              </div>
              <div class="mess">
                <label for="subject" id="sub"> Тема: </label>
                <input type="text" name="syb" id="subject">
              </div>
              
              
                 <div class="mess">
                    <textarea placeholder="СЪОБЩЕНИЕ" name="message" ></textarea>
                    <div id="send">
                	<input type="submit" id="upload" name="submit" value="ИЗПРАТИ" >
				</div>
                </div>

                
            </form>
        </div>
    </div>

</body>
</html>
<?php 

if (isset($_POST['submit'])){
	$to=($_POST['to']);
	$headers="FROM:".($_POST['from'])."\r\n)";
	$subject=($_POST['sub']);
	$txt=($_POST['message']);
	mail($to,$subject,$txt,$headers);
}
?>

