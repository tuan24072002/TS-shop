<?php
require 'connect.php';

$username = $_GET['username'];
$idsanpham = $_POST['idsanpham'];
$soluongcurrent = $_POST['soluongcurrent'];

$stmt = $conn->prepare("SELECT * FROM giohang WHERE idsanpham=? AND username=?");
$stmt->bind_param("ss", $idsanpham, $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$soluongnew = $soluongcurrent + $row['soluong'];

$stmt = $conn->prepare("UPDATE giohang SET soluong=? WHERE idsanpham=? AND username=?");
$stmt->bind_param("iss", $soluongnew, $idsanpham, $username);
if ($stmt->execute()) {
    echo 'Successful';
} else {
    echo 'Failed';
}

$stmt->close();
$conn->close();
?>