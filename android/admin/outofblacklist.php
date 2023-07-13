<?php
require 'inc/header.php';
if (isset($_SESSION['login'])) {
    require 'class/Database.php';
    require 'class/Account.php';
    $id = $_GET['id'];
    $db = new Database();
    $pdo = $db->connectDB();

    if (Account::outOfBlackList($pdo, $id)) {
        header('location: blacklist.php');
        exit;
    }
    require 'inc/footer.php';
} 
else {
    header('location: index.php');
}
