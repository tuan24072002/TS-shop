<?php
class OrderDetail{
    public $id;
    public $madonhang;
    public $masanpham;
    public $tensanpham;
    public $giasanpham;
    public $hinhsanpham;
    public $soluongsanpham;
    public $ngaydathang;
    public static function getAll($pdo,$madh)
    {
        $select = "SELECT * FROM ct_donhang WHERE madonhang=:madonhang";
        $stm = $pdo->prepare($select);
        $stm->bindValue(':madonhang',$madh,PDO::PARAM_STR);

        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'OrderDetail');
            return $stm->fetchAll();
        }
    }
    public static function delete($pdo, $mdh)
    {
        $select = "DELETE FROM ct_donhang WHERE madonhang=:id";
        $stm = $pdo->prepare($select);
        $stm->bindValue(':id', $mdh, PDO::PARAM_STR);

        if ($stm->execute()) {
            return true;
        }
    }
}