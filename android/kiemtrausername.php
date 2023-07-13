<?php
require 'connect.php';
require 'validate.php';

$username = validate($_POST['username']);

$stmt = $conn->prepare("SELECT * FROM taikhoan WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo 'Failed';
} else {
    echo 'Successful';
}

$stmt->close();
$conn->close();
?>