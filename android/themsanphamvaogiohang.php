<?php
require 'connect.php';

$username = $_GET['username'];
$idsanpham = $_POST['idthemsanpham'];
$soluong = $_POST['soluong'];

$stmt = $conn->prepare("SELECT * FROM sanpham WHERE id=?");
$stmt->bind_param("i", $idsanpham);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$tensanpham = $row['tensp'];
$giasanpham = $row['giasp'];
$hinhsanpham = $row['hinhanhsanpham'];

$stmt = $conn->prepare("INSERT INTO giohang (username, idsanpham, tensanpham, giasanpham, hinhsanpham, soluong) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $username, $idsanpham, $tensanpham, $giasanpham, $hinhsanpham, $soluong);
if ($stmt->execute()) {
    echo 'Successful';
} else {
    echo 'Failed';
}

$stmt->close();
$conn->close();
?>