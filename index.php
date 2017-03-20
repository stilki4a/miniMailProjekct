<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <title>Surat Tefter</title>
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
      



     
     
</head>
<body>
	<div id="wrrap">
	<div id="surat">
	 	<button id="add"><a href="./login.php">Добави</a></button>
			<h1>Сурат Тефтер</h1>
	</div>
<?php
    $linkKumBazata=mysqli_connect("localhost","root","");
    mysqli_select_db($linkKumBazata,"mejdbaza");
    $izvlichame =mysqli_query($linkKumBazata,'SELECT * FROM users');


    while ($row = mysqli_fetch_array($izvlichame)){

        echo "<div id='profile' value='$row[user_id]'>";
        	echo "<div id='link'>";

		        echo " <a href='./sendMail.php?name=$row[user_id]'>";
		        echo"<img src='$row[snimkaLink]'alt=''>";
		        echo"<h2>$row[user_name]</h2>";
		        echo "</a>";
		    echo"</div>";

           echo " <div id='dell'>
           			<form action='' method='post'>
               			 <button name='delete' id='delete' value='$row[user_id]'><img src='./assets/images/delete.png' alt=''></button>
           			 </form>
           		</div>";
    echo "</div>";

}


if (isset($_REQUEST['delete'])) {


	$id = ($_REQUEST['delete']);
	 

	$ime = "";
	$email = "";
	$status = "";
	$snimka = "";

	$linkKumBazata = mysqli_connect("localhost", "root", "");
	mysqli_select_db($linkKumBazata, "mejdbaza");
	$trieme = mysqli_query($linkKumBazata,
			"DELETE
			FROM users
			WHERE user_id='$id'
			");
	header('Location:index.php',true,302);


}


?>
<script>
$(document).ready(function(){
	
    $("delete").click(function(){

    	var id=document.getElementById('delete');
    	var userForDell = document.getElementById('profile');
    	console.log(id);
    	if(userForDell.value == id){
        $("userForDell").remove();
    	}
    });
});
</script>

	</div>
</body>
