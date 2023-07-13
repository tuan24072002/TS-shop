<?php
require 'inc/header-admin.php';
if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    require "./inc/init.php";
    $username = $_GET['username'];
    if(Auth::addBlackList($pdo,$username)){
        header('location: ./user.php');
    }
?>
<?php require 'inc/footer-admin.php';
} else {
    header('location: ../index.php');
} ?>