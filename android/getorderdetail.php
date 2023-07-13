<?php
require 'connect.php';
$madh = $_GET['madonhang'];
$sql = "SELECT * FROM ct_donhang WHERE madonhang=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $madh);
$stmt->execute();
$data = $stmt->get_result();
$mangctdh = array();
while ($row = $data->fetch_assoc()) {
    array_push($mangctdh, new CT_DonHang(
        $row['madonhang'],
        $row['masanpham'],
        $row['tensanpham'],
        $row['giasanpham'],
        $row['hinhsanpham'],
        $row['soluongsanpham']
    ));
}
echo json_encode($mangctdh);

class CT_DonHang
{
    public string $madonhang;
    public int $masanpham;
    public string $tensp;
    public int $giasp;
    public string $hinhsp;
    public int $soluongsp;

    function __construct($madonhang, $masanpham, $tensp, $giasp, $hinhsp, $soluongsp)
    {
        $this->madonhang = $madonhang;
        $this->masanpham = $masanpham;
        $this->tensp = $tensp;
        $this->giasp = $giasp;
        $this->hinhsp = $hinhsp;
        $this->soluongsp = $soluongsp;
    }
}
