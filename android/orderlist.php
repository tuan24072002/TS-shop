<?php
require 'connect.php';
$hihi = $_GET['username'];
$mangdh = array();
$stmt = $conn->prepare("SELECT * FROM donhang WHERE `username` = ?");
$stmt->bind_param("s", $hihi);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    array_push($mangdh, new DonHang(
        $row['id'],
        $row['ngaydathang'],
        $row['tonggia'],
        $row['trangthai']
    ));
}
echo json_encode($mangdh);

class DonHang
{
    public $id;
    public $ngaydathang;
    public $tonggia;
    public $trangthai;

    public function __construct($id, $ngaydathang, $tonggia, $trangthai)
    {
        $this->id = $id;
        $this->ngaydathang = $ngaydathang;
        $this->tonggia = $tonggia;
        $this->trangthai = $trangthai;
    }
}

$stmt->close();
$conn->close();
?>