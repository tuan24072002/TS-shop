<?php
    require 'connect.php';
    $page = $_GET['page'];
    $idsp=$_POST['idsanpham'];
    $space=8;
    $limit=($page-1)*$space;
    $mangsanpham=array();
    $query="SELECT * FROM sanpham where idsanpham=$idsp LIMIT $limit, $space";
    $data=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($data)){
        array_push($mangsanpham,new Sanpham(
            $row['id'],
            $row['tensp'],
            $row['giasp'],
            $row['hinhanhsanpham'],
            $row['motasp'],
            $row['idsanpham']
        ));
    }
    echo json_encode($mangsanpham);
    class Sanpham{
        public  $id;
        public  $tensp;
        public  $giasp;
        public  $hinhanhsanpham;
        public  $motasp;
        public  $idsanpham;
        public function __construct($id, $tensp,$giasp,$hinhanhsanpham,$motasp,$idsanpham){
            $this->id=$id;
            $this->tensp=$tensp;
            $this->giasp=$giasp;
            $this->hinhanhsanpham=$hinhanhsanpham;
            $this->motasp=$motasp;
            $this->idsanpham=$idsanpham;
        }
    }
?>