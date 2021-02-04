<?php
session_start();
include_once("dbconnect.php");
$businessid = $_GET['businessid']; 
$name = $_GET['name'];

// if (isset($_COOKIE["email"])){
//   echo "Value is: " . $_COOKIE["email"];
// }
echo "<head><link rel='stylesheet' href='mainpage.css'><link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\"></head>";

if (isset($_SESSION["name"])){

//delete operation
if (isset($_COOKIE["timer"])){
    if (isset($_GET['operation'])) {
      $noid = $_GET['noid'];
      try {
        $sql = "DELETE FROM itemsales WHERE businessid='$businessid' AND noid='$noid'";
        $conn->exec($sql);
        echo "<script> alert('Delete Success')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Delete Error')</script>";
      }
    }

    try {
        if (isset($_GET['subject'])) {
            $subject = $_GET['subject'];
            $sql = "SELECT * FROM itemsales WHERE businessid = '$businessid' AND typeofitem LIKE '%$subject%' ORDER BY noid ASC";
        }else{
            $sql = "SELECT * FROM itemsales WHERE businessid = '$businessid' ORDER BY noid ASC";    
        }
        
        $stmt = $conn->prepare($sql );
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $itemsales = $stmt->fetchAll(); 
        
        echo "<p><h1 align='center'>Your Sales</h1></p>";
        echo "
        <form class=\"example\" action=\"mainpage.php\" style=\"margin:auto;max-width:300px\">
        <input type=\"text\" placeholder=\"Search by type of item..\" name=\"subject\">
        <input type=\"hidden\" name=\"businessid\" value=$businessid>
        <input type=\"hidden\" name=\"name\" value=$name>
        <button type=\"submit\"><i class=\"fa fa-search\"></i></button>
        </form><br>";
       
        echo "<table border='3' align='center'>
        <tr>
          <th>No ID</th>
          <th>Type of Item</th>
          <th>Item Name</th>
          <th>Item Stock</th>
          <th>Item Sales</th>
          <th>Item Left</th>
          <th>Operation</th>
        </tr>";

        foreach($itemsales as $itemsales) {
            echo "<tr>";
            echo "<td>".$itemsales['noid']."</td>";
            echo "<td>".$itemsales['typeofitem']."</td>";
            echo "<td>".$itemsales['itemname']."</td>";
            echo "<td>".$itemsales['itemstock']."</td>";
            echo "<td>".$itemsales['salesitem']."</td>";
            echo "<td>".$itemsales['itemleft']."</td>";
            echo "<td><a href='mainpage.php?businessid=".$businessid."&name=".$name."&noid=".$itemsales['noid']."&operation=del' onclick= 'return confirm(\"Delete. Are your sure?\");'>Delete</a><br>
            <a href='update.php?businessid=".$businessid."&name=".$name."&noid=".$itemsales['noid']."&typeofitem=".$itemsales['typeofitem'].
            "&itemname=".$itemsales['itemname']."&itemstock=".$itemsales['itemstock']."&salesitem=".$itemsales['salesitem']."&itemleft=".$itemsales['itemleft']." '>Update</a></td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo "<button onclick=\"window.print()\">Print this page</button>";
        echo "<p align='center'><a href='newgrade.php?businessid=".$businessid."&name=".$name."'>Insert new Item</a></p>";
        echo "<p align='center'><a href='index.html'>Logout</a></p>";

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }else{
    echo "<script> alert('Timer expired!!!')</script>";
    echo "<script> window.location.replace('index.html') </script>;";
  }
  }else{
    echo "<script> alert('Session Expired!!!')</script>";
    echo "<script> window.location.replace('index.html') </script>;";
  }
  $conn = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="mainpage.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<body>

</body>

</html>