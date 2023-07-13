<?php
require 'connect.php';

$idminus = $_POST['idminus'];

$stmt = $conn->prepare("SELECT * FROM giohang WHERE id = ?");
$stmt->bind_param("i", $idminus);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$soluong = $row['soluong'];

if ($soluong >= 2) {
    $soluongminus = $soluong - 1;
    $stmt = $conn->prepare("UPDATE giohang SET soluong = ? WHERE id = ?");
    $stmt->bind_param("ii", $soluongminus, $idminus);
    if ($stmt->execute()) {
        echo 'Successful';
    } else {
        echo 'Failed';
    }
} else {
    $stmt = $conn->prepare("DELETE FROM giohang WHERE id = ?");
    $stmt->bind_param("i", $idminus);
    if ($stmt->execute()) {
        echo 'Successful';
    } else {
        echo 'Failed';
    }
}

$stmt->close();
$conn->close();
?>