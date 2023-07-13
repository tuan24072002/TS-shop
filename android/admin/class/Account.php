<?php
class Account{
    public $id;
    public $username;
    public $password;
    public $name;
    public $sodienthoai;
    public $diachi;
    public static function getAll($pdo)
    {
        $select = "SELECT * FROM taikhoan WHERE role!=1 AND blacklist=0";
        $stm = $pdo->prepare($select);

        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Account');
            return $stm->fetchAll();
        }
    }
    public static function getOneByID($pdo,$id)
    {
        $select_one = "SELECT * FROM taikhoan WHERE id=:id";
        $stm = $pdo->prepare($select_one);

        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Account');
            return $stm->fetch();
        }
    }
    public static function delete($pdo, $id)
    {
        $delete = "DELETE FROM taikhoan WHERE id=:id";
        $stm = $pdo->prepare($delete);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            return true;
        }
    }
    public static function getAllBlackList($pdo)
    {
        $select = "SELECT * FROM taikhoan WHERE role!=1 AND blacklist=1";
        $stm = $pdo->prepare($select);

        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Account');
            return $stm->fetchAll();
        }
    }
    public static function addToBlackList($pdo, $id){
        $update="UPDATE taikhoan SET blacklist=1 WHERE id=:id";
        $stm = $pdo->prepare($update);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            return true;
        }
    }
    public static function outOfBlackList($pdo, $id){
        $update="UPDATE taikhoan SET blacklist=0 WHERE id=:id";
        $stm = $pdo->prepare($update);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            return true;
        }
    }
}