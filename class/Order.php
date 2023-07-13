<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Order
{
    public string $orderid;
    public string $username;
    public string $date;
    public int $total;
    public string $state;
    public string $payment;
    public string $name;
    public string $phonenumber;
    public string $address;
    public string $status;

    public static function updateStatus( $pdo, $orderid)
    {
        $sql = "UPDATE `order` SET status = 'finished' WHERE orderid = :orderid";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':orderid', $orderid, PDO::PARAM_STR);
        
        try {
            $stm->execute();
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi (nếu cần)
            return false;
        }
    }

    public static function getAllOrder($pdo){
        $sql = "SELECT * FROM `order`";
        $stm = $pdo->prepare($sql);
        
        try {
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Xử lý lỗi (nếu cần)
            return false;
        }
    }

    public static function getOrderById( $pdo, $orderid)
    {
        $select = "SELECT * FROM `order` WHERE orderid = :orderid";
        $stm = $pdo->prepare($select);
        $stm->bindValue(':orderid', $orderid, PDO::PARAM_STR);
        
        try {
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Xử lý lỗi (nếu cần)
            return false;
        }
    }

    public static function deleteOrderById( $pdo, $orderid)
    {
        $select = "DELETE FROM `order` WHERE orderid = :orderid";
        $stm = $pdo->prepare($select);
        $stm->bindValue(':orderid', $orderid, PDO::PARAM_STR);
        
        try {
            $stm->execute();
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi (nếu cần)
            return false;
        }
    }

    public static function addOrder( $pdo, $username)
    {
        $time="SET time_zone ='+07:00'; SELECT NOW() as 'timezone'";
        $stm = $pdo->prepare($time);
        $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        
        
        
        $sql = "INSERT INTO `order` (username, date) VALUES (:username, :now)";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':username', $username, PDO::PARAM_STR);
        $stm->bindValue(':now', $row['timezone'], PDO::PARAM_STR);
        try {
            $stm->execute();
            $select = "SELECT * FROM `order` WHERE state = 'cart' AND username = :username";
            $stm = $pdo->prepare($select);
            $stm->bindValue(':username', $username, PDO::PARAM_STR);
            $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            return $row['orderid'];
        } catch (PDOException $e) {
            // Xử lý lỗi (nếu cần)
            return false;
        }
    }

    public static function checkOrderExist( $pdo, $username)
    {
        $sql = "SELECT * FROM `order` WHERE username = :username AND state = 'cart'";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':username', $username, PDO::PARAM_STR);
        
        try {
            $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            return $row['orderid'];
        } catch (PDOException $e) {
            // Xử lý lỗi (nếu cần)
            return false;
        }
    }

    public static function payment( $pdo, $orderid, $username, $total, $payment)
    {
        $sql = "SELECT * FROM account WHERE username = :username";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':username', $username, PDO::PARAM_STR);
        
        try {
            $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            
            $time="SET time_zone ='+07:00'; SELECT NOW() as 'timezone'";
            $stmtime = $pdo->prepare($time);
            $stmtime->execute();
            $row1 = $stmtime->fetch(PDO::FETCH_ASSOC);
            
            
            $update = "UPDATE `order` SET total = :total, state = 'finished', payment = :payment, name = :name, phonenumber = :phonenumber, address = :address, date = :now WHERE orderid = :orderid";
            $stm = $pdo->prepare($update);
            $stm->bindValue(':total', $total, PDO::PARAM_INT);
            $stm->bindValue(':payment', $payment, PDO::PARAM_STR);
            $stm->bindValue(':name', $row['name'], PDO::PARAM_STR);
            $stm->bindValue(':phonenumber', $row['phonenumber'], PDO::PARAM_STR);
            $stm->bindValue(':address', $row['address'], PDO::PARAM_STR);
            $stm->bindValue(':orderid', $orderid, PDO::PARAM_STR);
            $stm->bindValue(':now', $row1->timezone, PDO::PARAM_STR);
            $stm->execute();
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi (nếu cần)
            return false;
        }
    }
}
?>
