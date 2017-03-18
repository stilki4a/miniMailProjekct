<?php
    if (isset($_REQUEST['delete'])) {


            $id = ($_REQUEST['delete']);
            echo $id;

            $ime = "";
            $email = "";
            $status = "";
            $snimka = "";

            $linkKumBazata = mysqli_connect("localhost", "root", "");
            mysqli_select_db($linkKumBazata, "mejdbaza");
            $trieme = mysqli_query($linkKumBazata,
                "DELETE
                    FROM users
                    WHERE id_user='$id'
                    ");
            header('Location:index.php',true,302);


    }