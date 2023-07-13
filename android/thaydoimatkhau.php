<?php
require 'connect.php';
require 'validate.php';

$hihi = $_GET['username'];
$newpassword = validate($_POST['newpassword']);
$hash = password_hash($newpassword, PASSWORD_DEFAULT);

$stmt = $conn->prepare("UPDATE taikhoan SET `password` = ? WHERE username = ?");
$stmt->bind_param("ss", $hash, $hihi);
if ($stmt->execute()) {
    echo 'Successful';
} else {
    echo 'Failed';
}

$stmt->close();
$conn->close();
?>