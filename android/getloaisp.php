<?php
require './connect.php';

$select = "SELECT * FROM loaisanpham";
$data = mysqli_query($conn, $select);
$mangloaisp = array();
while($row=mysqli_fetch_assoc($data)){
    array_push($mangloaisp,new Loaisp($row['id'],$row['tenloaisp'],$row['hinhanhloaisp']));
}
echo json_encode($mangloaisp);
class Loaisp
{
    public $id;
    public $tenloaisp;
    public $hinhanhloaisp;

    public function __construct($id, $tenloaisp, $hinhanhloaisp)
    {
        $this->id = $id;
        $this->tenloaisp = $tenloaisp;
        $this->hinhanhloaisp = $hinhanhloaisp;
    }
}
?>