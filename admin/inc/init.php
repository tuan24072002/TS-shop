<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
require __DIR__ . '/../../class/Database.php';
require __DIR__ . '/../../class/Product.php';
require __DIR__ . '/../../class/Orderdetail.php';
require __DIR__ . '/../../class/Order.php';
require __DIR__ . '/../../class/Auth.php';

require '../../config.php';
$db = new Database(db_host,db_name,db_user,db_pass,db_port);
$pdo = $db->connectDB();