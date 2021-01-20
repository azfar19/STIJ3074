<?php
   include_once("dbconnect.php");
   
   $name=$_POST["name"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $calorie=$_POST["calorie"];

    try {
        $sql = "INSERT INTO pset3(name, price, quantity,calorie)
        VALUES ('$name', '$price', '$quantity','$calorie')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "<script> alert('Insert Success')</script>";
        echo "<script> window.location.replace('foodstore.html') </script>;";
    } catch(PDOException $e) {
        echo "<script> alert('Registration Error')</script>";
        echo "<script> window.location.replace('foodstore.html') </script>;";
    }
    $conn = null;
    
    //}else{
    //  echo "<script> alert('Timer expired!!!')</script>";
    //  echo "<script> window.location.replace('index.html') </script>;";
    //}
    ?>