<?php
require 'connect.php';

$hihi = $_GET['username'];
$mangtk = array();

$stmt = $conn->prepare("SELECT name, sodienthoai, diachi FROM taikhoan WHERE username = ?");
$stmt->bind_param("s", $hihi);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    array_push($mangtk, new TaiKhoan(
        $row['name'],
        $row['sodienthoai'],
        $row['diachi']
    ));
}

echo json_encode($mangtk);

class TaiKhoan
{
    public $name;
    public $sodienthoai;
    public $diachi;

    public function __construct($name, $sodienthoai, $diachi)
    {
        $this->name = $name;
        $this->sodienthoai = $sodienthoai;
        $this->diachi = $diachi;
    }
}

$stmt->close();
$conn->close();
?>