<?php
require 'connect.php';
$mangiohang = array();
$hihi = $_GET['username'];
$stmt = $conn->prepare("SELECT * FROM giohang WHERE username=?");
$stmt->bind_param("s", $hihi);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    array_push($mangiohang, new GioHang(
        $row['id'],
        $row['username'],
        $row['idsanpham'],
        $row['tensanpham'],
        $row['giasanpham'],
        $row['hinhsanpham'],
        $row['soluong']
    ));
}
echo json_encode($mangiohang);

class GioHang
{
    public  $id;
    public  $username;
    public  $idsanpham;
    public  $tensanpham;
    public  $giasanpham;
    public  $hinhsanpham;
    public  $soluong;

    public function __construct($id, $username, $idsanpham, $tensanpham, $giasanpham, $hinhsanpham, $soluong)
    {
        $this->id = $id;
        $this->username = $username;
        $this->idsanpham = $idsanpham;
        $this->tensanpham = $tensanpham;
        $this->giasanpham = $giasanpham;
        $this->hinhsanpham = $hinhsanpham;
        $this->soluong = $soluong;
    }
}

$stmt->close();
$conn->close();
?>