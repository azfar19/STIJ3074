<?php
//connect to db
$servername = "sql204.epizy.com";
$username = "epiz_27068003";
$passworddb = "lQaOW1JCqxet";
$dbname = "epiz_27068003_pset3";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passworddb);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>