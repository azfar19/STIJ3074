<?php
include_once("dbconnect.php");
$businessid = $_GET['businessid'];
$name = $_GET['name'];

// if (isset($_COOKIE["email"])){
//   echo "Value is: " . $_COOKIE["email"];
// }
echo "<head></head><link rel='stylesheet' href='insert.css'></head>";

if (isset($_GET['noid'])) {
  $noid = $_GET['noid'];
  $typeofitem = $_GET['typeofitem'];
  $itemname = $_GET['itemname'];
  $itemstock = $_GET['itemstock'];
  $salesitem = $_GET['salesitem'];
  $itemleft = $_GET['itemleft'];

  try {
    $sql = "INSERT INTO itemsales(noid, typeofitem, itemname,itemstock, salesitem, itemleft, businessid)
    VALUES ('$noid', '$typeofitem', '$itemname','$itemstock', '$salesitem', '$itemleft', '$businessid')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Insert Success')</script>";
    echo "<script> window.location.replace('mainpage.php?businessid=".$businessid."&name=".$name."') </script>;";

  } catch(PDOException $e) {
    echo "<script> alert('Insert Error')</script>";
    //echo "<script> window.location.replace('register.html') </script>;";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<p>
<h2 align='center'><?php echo $name?></h2>
</p>

<body>
  
<div class="form-style-5">
<form action="newgrade.php" method="get" align="center" onsubmit="return confirm('Insert new Item?');">
<fieldset>
<legend><span class="number">""</span> Insert Your Item</legend>
<input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
<input type="hidden" id="businessid" name="businessid" value="<?php echo $businessid;?>"><br>
<input type="text" id="noid" name="noid" value="" required placeholder="No ID *">
<input type="text" id="typeofitem" name="typeofitem" value="" required placeholder="Type of Item *">
<input type="text" id="itemname" name="itemname" value="" required placeholder="Item Name *">
<input type="text" id="itemstock" name="itemstock" value="" required placeholder="Item Stock *">
<input type="text" id="salesitem" name="salesitem" value="" required placeholder="Item Sold *">
<input type="text" id="itemleft" name="itemleft" value="" required placeholder="Item Left *">
<input type="submit" value="Submit" class="button">
</form>
</form>
    <p align="center"><a href="mainpage.php?businessid=<?php echo $businessid.'&name='.$name?>">Cancel</a></p>
</body>
</div>