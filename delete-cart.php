<?php
require 'inc/header-orther.php';
require './inc/init.php';
$id=$_GET['id'];
if(OrderDetail::delete($pdo,$id,$_SESSION['orderid'])){
    header('location: cart.php');
}
?>