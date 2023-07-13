<?php
class Order
{
    public $id;
    public $username;
    public $name;
    public $sodienthoai;
    public $diachi;
    public $tonggia;
    public $ngaydathang;
    public $trangthai;
    public static function getAll($pdo)
    {
        $select = "SELECT * FROM donhang";
        $stm = $pdo->prepare($select);

        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Order');
            return $stm->fetchAll();
        }
    }
    public static function getOneByID($pdo,$mdh)
    {
        $select = "SELECT * FROM donhang WHERE id=:id";
        $stm = $pdo->prepare($select);
        $stm->bindValue(':id', $mdh, PDO::PARAM_STR);

        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Order');
            return $stm->fetch();
        }
    }
    public static function delete($pdo, $mdh)
    {
        $select = "DELETE FROM donhang WHERE id=:id";
        $stm = $pdo->prepare($select);
        $stm->bindValue(':id', $mdh, PDO::PARAM_STR);

        if ($stm->execute()) {
            return true;
        }
    }
    public static function edit($pdo, $mdh)
    {
        $update = "UPDATE donhang SET trangthai='Finished' WHERE id=:id";
        $stm = $pdo->prepare($update);
        $stm->bindValue(':id', $mdh, PDO::PARAM_STR);
        if ($stm->execute()) {
            return true;
        }
    }
}
