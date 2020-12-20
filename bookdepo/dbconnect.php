<?php
    $server = "localhost";
    $user = "root";
    $password="";
    $db_name = "bookdepo";

    $db = mysqli_connect($server,$user,$password,$db_name);
    if(!$db){
        die("Failed : ".mysqli_connect_error());

        
    }

    ?>