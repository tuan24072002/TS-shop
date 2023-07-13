<?php
require 'inc/header-admin.php';
if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    require "./inc/init.php";
    if (empty($_GET['orderid'])) {
        header('location: ./index-admin.php');
    }
    $orderid = $_GET['orderid'];
    if (Order::updateStatus($pdo, $orderid)) {
        header('location: ./order.php');
        exit;
    }
?>
<?php require 'inc/footer-admin.php';
} else {
    header('location: ../index.php');
} ?>