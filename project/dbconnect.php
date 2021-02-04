<?php
//connect to db
$servername = "sql100.epizy.com";
$username = "epiz_27510222";
$passworddb = "S32ZhqDc3lcNZr";
$dbname = "epiz_27510222_salesproject";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passworddb);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>