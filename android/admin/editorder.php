<?php
require 'inc/header.php';
if (isset($_SESSION['login'])) {
    require 'class/Database.php';
    require 'class/Order.php';
    $db = new Database();
    $pdo = $db->connectDB();
    $id = $_GET['id'];
    if (Order::edit($pdo, $id)) {
        header('location: order.php');
        exit;
    }
    require 'inc/footer.php';
} else {
    header('location: index.php');
}
