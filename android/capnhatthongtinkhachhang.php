<?php
require 'connect.php';
$hihi = $_GET['username'];
$name = $_POST['name'];
$sodienthoai = $_POST['sodienthoai'];
$diachi = $_POST['diachi'];

$stmt = $conn->prepare("UPDATE `taikhoan` SET `name`=?, `sodienthoai`=?, `diachi`=? WHERE `username`=?");
$stmt->bind_param("ssss", $name, $sodienthoai, $diachi, $hihi);
if ($stmt->execute()) {
    echo 'Successful';
} else {
    echo 'Failed';
}

$stmt->close();
$conn->close();
?>