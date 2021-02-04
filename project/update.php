<?php
include_once("dbconnect.php");
$businessid = $_GET['businessid'];
$name = $_GET['name'];
$noid = $_GET['noid'];
$typeofitem = $_GET['typeofitem'];
$itemname = $_GET['itemname'];
$itemstock = $_GET['itemstock'];
$salesitem = $_GET['salesitem'];
$itemleft = $_GET['itemleft'];

echo "<head></head><link rel='stylesheet' href='insert.css'></head>";

if (isset($_GET['operation'])) {
    try {
        $sqlupdate = "UPDATE itemsales SET typeofitem = '$typeofitem', itemname = '$itemname', itemstock = '$itemstock', salesitem = '$salesitem', itemleft = '$itemleft' WHERE businessid = '$businessid' AND noid = '$noid'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('mainpage.php?businessid=".$businessid."&name=".$name."') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
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
<form action="update.php" method="get" align="center" onsubmit="return confirm('Update?');">
<fieldset>
<legend><span class="number">""</span> Update Your Item</legend>
<input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
        <input type="hidden" id="businessid" name="businessid" value="<?php echo $businessid;?>"><br>
        <input type="hidden" id="noid" name="noid" value="<?php echo $noid;?>" required><br>
        <input type="hidden" id="operation" name="operation" value="update"><br>
<input type="text" id="typeofitem" name="typeofitem" value="<?php echo $typeofitem;?>" required placeholder="Type of Item *">
<input type="text" id="itemname" name="itemname" value="<?php echo $itemname;?>" required placeholder="Item Name *">
<input type="text" id="itemstock" name="itemstock" value="<?php echo $itemstock;?>" required placeholder="Item Stock *">
<input type="text" id="salesitem" name="salesitem" value="<?php echo $salesitem;?>" required placeholder="Item Sold *">
<input type="text" id="itemleft" name="itemleft" value="<?php echo $itemleft;?>" required placeholder="Item Left *">
<input type="submit" value="Update" class="button">
</form>
</form>
    <p align="center"><a href="mainpage.php?businessid=<?php echo $businessid.'&name='.$name?>">Cancel</a></p>
</body>
</div>