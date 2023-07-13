<?php
$host = "srv479.hstgr.io";
$db = "u264766295_android";
$port=3306;
$username = "u264766295_android_admin";
$password = "Admin123";
$conn= mysqli_connect($host,$username,$password,$db,$port);
mysqli_query($conn, "SET NAMES 'utf8'");
?>