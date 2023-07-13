<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
require './class/Database.php';
require './class/Product.php';
require './class/Orderdetail.php';
require './class/Order.php';
require './class/Auth.php';
require './config.php';

$db = new Database(db_host,db_name,db_user,db_pass,db_port);
$pdo = $db->connectDB();
?>