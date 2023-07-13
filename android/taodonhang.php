<?php
require 'connect.php';
$username = $_GET['username'];
$result = "";
$rs = "";

$stmt = $conn->prepare("SELECT * FROM taikhoan WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

$insert = "INSERT INTO donhang(username, name, sodienthoai, diachi, tonggia, ngaydathang, trangthai) VALUES(?, ?, ?, ?, 0, NOW(), 'Delivery')";
$stmt = $conn->prepare($insert);
$stmt->bind_param("ssss", $username, $row['name'], $row['sodienthoai'], $row['diachi']);
if ($stmt->execute()) {
    $result = 'Successful';
} else {
    $result = 'Failed';
}
$stmt->close();

if ($result == 'Successful') {
    $insert_CT_donhang = "INSERT INTO ct_donhang (madonhang, masanpham, tensanpham, giasanpham, hinhsanpham, soluongsanpham, ngaydathang)
        SELECT donhang.id, giohang.idsanpham, giohang.tensanpham, giohang.giasanpham, giohang.hinhsanpham, giohang.soluong, donhang.ngaydathang
        FROM donhang
        JOIN giohang ON donhang.username = giohang.username
        WHERE donhang.username = ? AND donhang.ngaydathang = NOW()";
    $stmt = $conn->prepare($insert_CT_donhang);
    $stmt->bind_param("s", $username);
    if ($stmt->execute()) {
        $rs = 'Successful';
    } else {
        $rs = 'Failed';
    }
    $stmt->close();
}

if ($rs == 'Successful') {
    $update_donhang = "UPDATE donhang SET tonggia = (SELECT SUM(soluong * giasanpham) FROM giohang WHERE username = ?) WHERE ngaydathang = NOW()";
    $stmt = $conn->prepare($update_donhang);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();

    $delete_giohang = "DELETE FROM giohang WHERE username = ?";
    $stmt = $conn->prepare($delete_giohang);
    $stmt->bind_param("s", $username);
    if ($stmt->execute()) {
        echo 'Successful';
    } else {
        echo 'Failed';
    }
    $stmt->close();
}

$conn->close();
?>
