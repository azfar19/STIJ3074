<?php
    $name=$_POST["name"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $calorie=$_POST["calorie"];

    //Database connection

    $conn=new mysqli('localhost','root','','pset3');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);

    }else{
        $stmt=$conn->prepare("insert into foodstore(name,price,quantity,calorie)
            values(?,?,?,?)");
        $stmt->bind_param("ssss", $name, $price, $quantity, $calorie);
        $stmt->execute();
        echo "Food Data Successfully";
        $stmt->close();
        

    }
?>
