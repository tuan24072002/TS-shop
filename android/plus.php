<?php
require 'connect.php';

$idplus = $_POST['idplus'];

$stmt = $conn->prepare("SELECT * FROM giohang WHERE id = ?");
$stmt->bind_param("i", $idplus);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$soluongplus = $row['soluong'] + 1;

$stmt = $conn->prepare("UPDATE giohang SET soluong = ? WHERE id = ?");
$stmt->bind_param("ii", $soluongplus, $idplus);
if ($stmt->execute()) {
    echo 'Successful';
} else {
    echo 'Failed';
}

$stmt->close();
$conn->close();
?>