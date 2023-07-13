<?php
require 'connect.php';
require 'validate.php';

$password = validate($_POST['currentpassword']);
$hihi = $_GET['username'];

$stmt = $conn->prepare("SELECT password FROM taikhoan WHERE username = ?");
$stmt->bind_param("s", $hihi);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (password_verify($password, $row['password'])) {
    echo 'Successful';
} else {
    echo 'Failed';
}

$stmt->close();
$conn->close();
?>