<?php
    require 'connect.php';
    $id = $_POST['idgiohang'];
    $stmt = $conn->prepare("DELETE FROM giohang WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo 'Successful';
    } else {
        echo 'Failed';
    }
    $stmt->close();
    $conn->close();
?>