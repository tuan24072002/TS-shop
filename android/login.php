<?php
require 'connect.php';
require 'validate.php';

$username = validate($_POST['username']);
$password = $_POST['password'];

$selectOne = "SELECT * FROM taikhoan WHERE username=?";
$stmt = $conn->prepare($selectOne);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hash = $row['password'];

    if (password_verify($password, $hash)) {
        echo 'Successful';
    } else {
        echo 'Failed';
    }
} else {
    echo 'Failed';
}

$stmt->close();
$conn->close();
?>