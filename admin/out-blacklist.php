<?php
require 'inc/header-admin.php';
if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    require "./inc/init.php";
    if (empty($_GET['username'])) {
        header('location: ./index-admin.php');
    }
    $username = $_GET['username'];
    if (Auth::outBlackList($pdo, $username)) {
        header('location: ./blacklist.php');
    }
?>
<?php require 'inc/footer-admin.php';
} else {
    header('location: ../index.php');
} ?>