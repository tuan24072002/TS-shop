<?php
require 'inc/header-orther.php';
require 'inc/init.php';
$id=$_GET['id'];
$quantity=$_GET['quantity'];
if(Cart::updateQuantity($pdo,$quantity,$id)){
    header('location: cart.php');
}
?>