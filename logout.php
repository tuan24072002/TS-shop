<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['orderid']);
header('location: index.php');
exit();