<?php
require 'connect.php';
require 'validate.php';

$username = validate($_POST['username']);
$password = validate($_POST['password']);
$name = validate($_POST['name']);
$phonenumber = validate($_POST['phonenumber']);
$address = validate($_POST['address']);

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO taikhoan (username, password, name, sodienthoai, diachi) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $username, $hash, $name, $phonenumber, $address);

if ($stmt->execute()) {
    echo 'Successful';
} else {
    echo 'Failed';
}

$stmt->close();
$conn->close();
?>