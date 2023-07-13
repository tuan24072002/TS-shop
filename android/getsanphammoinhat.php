<?php
require 'connect.php';
$mangsp = array();
$select = "SELECT * FROM sanpham LIMIT 6";
$data = mysqli_query($conn, $select);
while ($row = mysqli_fetch_assoc($data)) {
    array_push($mangsp, new SanPhamMoiNhat(
        $row['id'],
        $row['tensp'],
        $row['giasp'],
        $row['hinhanhsanpham'],
        $row['motasp'],
        $row['idsanpham']
    ));
}
echo json_encode($mangsp);

class SanPhamMoiNhat
{
    public $id;
    public $tensp;
    public $giasp;
    public $hinhanhsanpham;
    public $motasp;
    public $idsanpham;

    public function __construct($id, $tensp, $giasp, $hinhanhsanpham, $motasp, $idsanpham)
    {
        $this->id = $id;
        $this->tensp = $tensp;
        $this->giasp = $giasp;
        $this->hinhanhsanpham = $hinhanhsanpham;
        $this->motasp = $motasp;
        $this->idsanpham = $idsanpham;
    }
}
?>