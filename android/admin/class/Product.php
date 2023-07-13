<?php
class Product
{
    public $id;
    public $tensp;
    public $giasp;
    public $hinhanhsanpham;
    public $motasp;
    public $idsanpham;
    public static function getAll($pdo)
    {
        $select = "SELECT * FROM sanpham";
        $stm = $pdo->prepare($select);

        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stm->fetchAll();
        }
    }
    public function create($pdo)
    {
        $insert = "INSERT INTO sanpham(tensp, giasp, hinhanhsanpham,motasp,idsanpham)
                    values(:tensp,:giasp,:hinhanhsanpham,:motasp,:idsanpham)";
        $stm = $pdo->prepare($insert);

        $stm->bindValue(':tensp', $this->tensp, PDO::PARAM_STR);
        $stm->bindValue(':giasp', $this->giasp, PDO::PARAM_INT);
        $stm->bindValue(':hinhanhsanpham', $this->hinhanhsanpham, PDO::PARAM_STR);
        $stm->bindValue(':motasp', $this->motasp, PDO::PARAM_STR);
        $stm->bindValue(':idsanpham', $this->idsanpham, PDO::PARAM_INT);
        if ($stm->execute()) {
            $this->id = $pdo->lastInsertId();
            return true;
        }
    }
    public static function delete($pdo, $id)
    {
        $delete = "DELETE FROM sanpham WHERE id=:id";
        $stm = $pdo->prepare($delete);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            return true;
        }
    }
    public static function getOneByID($pdo, $id)
    {
        $select_one = "SELECT * FROM sanpham WHERE id=:id";
        $stm = $pdo->prepare($select_one);

        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stm->fetch();
        }
    }
    public function edit($pdo, $id)
    {
        $update = "UPDATE sanpham SET tensp=:name,motasp=:desc,giasp=:price,idsanpham=:gender,hinhanhsanpham=:img WHERE id=:id";
        $stm = $pdo->prepare($update);
        $stm->bindValue(':name', $this->tensp, PDO::PARAM_STR);
        $stm->bindValue(':desc', $this->motasp, PDO::PARAM_STR);
        $stm->bindValue(':price', $this->giasp, PDO::PARAM_INT);
        $stm->bindValue(':img', $this->hinhanhsanpham, PDO::PARAM_STR);
        $stm->bindValue(':gender', $this->idsanpham, PDO::PARAM_INT);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            return true;
        }
    }
}
