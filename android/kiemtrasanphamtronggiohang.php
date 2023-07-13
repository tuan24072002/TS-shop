<?php
require 'connect.php';
$idsanpham = $_POST['idsanpham'];
$username = $_GET['username'];

$stmt = $conn->prepare("SELECT * FROM giohang WHERE idsanpham=? AND username=?");
$stmt->bind_param("ss", $idsanpham, $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo 'Successful';
} else {
    echo 'Failed';
}

$stmt->close();
$conn->close();
?>