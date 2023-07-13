<?php
require 'connect.php';
$madonhang = $_POST['madonhangcancel'];

$delete_CT_donhang = "DELETE FROM ct_donhang WHERE madonhang=?";
$stmt1 = $conn->prepare($delete_CT_donhang);
$stmt1->bind_param("s", $madonhang);
if ($stmt1->execute()) {
    $delete_donhang = "DELETE FROM donhang WHERE id=?";
    $stmt2 = $conn->prepare($delete_donhang);
    $stmt2->bind_param("s", $madonhang);
    if ($stmt2->execute()) {
        echo 'Successful';
    } else {
        echo 'Failed';
    }
} else {
    echo 'Failed';
}

$stmt1->close();
$stmt2->close();
$conn->close();
