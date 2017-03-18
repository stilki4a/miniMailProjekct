<?php
    if (isset($_POST['submit'])){

        $name = htmlentities(trim($_POST['userName']));
        $email =htmlentities(trim($_POST['userEmail']));
        $statuS =htmlentities(trim($_POST['stat']));


        if (isset($_FILES['image'])) {
            $fileOnServerName = $_FILES['image']['tmp_name'];
            $fileOriginalName = $_FILES['image']['name'];

            if (is_uploaded_file($fileOnServerName)) {
                if (move_uploaded_file($fileOnServerName,
                    "./dir/$fileOriginalName")) {
                    echo "Bravo, ti uspq! ";
                } else {
                    echo "Tuka si grozen! Smeni!";
                }
            }
            else {
                echo "Tuka si grozen! Smeni!";
            }
        }

        $snimka = "./dir/$fileOriginalName";


        $linkKumBazata = mysqli_connect("localhost","root","");
        $baza =mysqli_select_db($linkKumBazata,"mejdbaza");


        if (!$linkKumBazata){
            echo "problem s bazata";
        }


        $name =  mysqli_real_escape_string($linkKumBazata,$_POST['userName']);
        $email = mysqli_real_escape_string($linkKumBazata,$_POST['userEmail']);
        $statuS = mysqli_real_escape_string($linkKumBazata,$_POST['stat']);



        $zapis = "INSERT INTO users(id_user,name,email,status,snimkaLink)
                VALUES (null,'$name','$email','$statuS','$snimka')";


        $query =  mysqli_query($linkKumBazata,$zapis);

        header('Location:./index.php',true,302);
    }

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



    <form enctype='multipart/form-data' action="<?php $_SERVER['PHP_SELF']?>" method="post">


        <label for="userName"> Име: </label>
        <input type="text" name="userName" id="userName">
        <br/>
        <label for="userEmail">Email:</label>
        <input type="email" name="userEmail" id="userEmail">
        <br/>
        <label for="img">Снимки: </label>
        <input name="image" id="img" type="file"  accept="image/*" />
        <input type='hidden' name='MAX_FILE_SIZE' value='8000000' />
        <br/>
        <label for="status">Семейно положение</label>
        <select id="status" name="stat">
            <option value="Щастливо сам/а">Щастливо сам/а</option>
            <option value="За жалост стар/а">За жалост стар/а</option>
            <option value="Бракуван/а">Бракуван/а</option>
            <option value="Първа младост">Първа младост</option>
        </select>
        <br/>
            <input type="submit" id="upload" name="submit" value="Запиши" >
    </form>


</body>
</html>