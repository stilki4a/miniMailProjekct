<?php

    if (isset($_POST['submit'])) {
        $existingMail = false;

        $name = htmlentities(trim($_POST['userName']));
        $email = htmlentities(trim($_POST['userEmail']));
        $statuS = htmlentities(trim($_POST['stat']));
        if ((strlen($name) ===0) || (strlen($email) ===0) ){
                $prazniDanni = "Моля попълнете полетата";
        }else {

            if (isset($_FILES['image'])) {
                $fileOnServerName = $_FILES['image']['tmp_name'];
                $fileOriginalName = $_FILES['image']['name'];

                if (is_uploaded_file($fileOnServerName)) {
                    if (move_uploaded_file($fileOnServerName,
                        "./dir/$fileOriginalName")) {
                        echo "Успешно качихте симката! ";
                    }
//                else {
//                    echo "Нещо се обърка! Опитайте пак!";
//                }
//            }
//            else {
//                echo "Нещо се обърка! Опитайте пак!";
                }
            }


            $snimka = "./dir/$fileOriginalName";


            $linkKumBazata = mysqli_connect("localhost", "root", "");
            $baza = mysqli_select_db($linkKumBazata, "mejdbaza");


            if (!$linkKumBazata) {
                echo "problem s bazata";
            }

            $selectmail = mysqli_query($linkKumBazata, 'SELECT user_email FROM users');

//        var_dump($row['user_email']);

            while ($row = mysqli_fetch_array($selectmail)) {

                $name = mysqli_real_escape_string($linkKumBazata, $_POST['userName']);
                $email = mysqli_real_escape_string($linkKumBazata, $_POST['userEmail']);
                $statuS = mysqli_real_escape_string($linkKumBazata, $_POST['stat']);

            }

            $zapis = "INSERT INTO users(user_id,user_name,user_email,user_status,snimkaLink)
		                VALUES (null,'$name','$email','$statuS','$snimka')";


            $query = mysqli_query($linkKumBazata, $zapis);

            header('Location:./index.php', true, 302);


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
      <link rel="stylesheet" href="./assets/css/loginStyle.css" type="text/css" />
    <title>Registration</title>
</head>
<body>


<div id="login">
    <form enctype='multipart/form-data' action="<?php $_SERVER['PHP_SELF']?>" method="post">
    	<h1>Добре дошли</h1>

		<div class="pole">
	        <label for="userName"> Име:</label><br/>
	        <input type="text" name="userName" id="userName" class="pole">
        </div>
	    <div class="pole">
	        <label for="userEmail">Email:</label><br/>
        	<input type="email" name="userEmail" id="userEmail" class="pole">
            <span><?= $prazniDanni; ?></span>
	    </div>
	    <div class="pole">
	        <label for="img">Снимки:</label><br/>
	        <input name="image" id="img" type="file"  accept="image/*" class="pole"/>
	        <input type='hidden' name='MAX_FILE_SIZE' value='8000000' />
        </div>
        <div class="pole">
	        <label for="status">Семейно положение:</label>
	        <select id="status" name="stat" class="pole">
	            <option value="Щастливо сам/а">Щастливо сам/а</option>
	            <option value="За жалост стар/а">За жалост стар/а</option>
	            <option value="Бракуван/а">Бракуван/а</option>
	            <option value="Първа младост">Първа младост</option>
	        </select>
	        </div>
        <div id="zap">
            <input type="submit" id="submit" name="submit" value="Запиши" >
        </div>
    </form>
</div>

</body>
</html>