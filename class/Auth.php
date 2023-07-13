<?php
class Auth
{
    public $username;
    public $password;
    public $name;
    public $phonenumber;
    public $email;
    public $address;

    public static function checkBlackList($pdo, $username)
    {
        $sql = "SELECT * FROM account WHERE blacklist=1 and username='$username'";
        $stm = $pdo->prepare($sql);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            return true;
        }
    }
    public static function delete($pdo, $username)
    {
        $sql = "DELETE FROM account WHERE username='$username'";
        $stm = $pdo->prepare($sql);
        if ($stm->execute()) {
            return true;
        }
    }
    public static function addBlackList($pdo, $username)
    {
        $sql = "UPDATE account SET blacklist=1 WHERE username='$username'";
        $stm = $pdo->prepare($sql);
        if ($stm->execute()) {
            return true;
        }
    }
    public static function outBlackList($pdo, $username)
    {
        $sql = "UPDATE account SET blacklist=0 WHERE username='$username'";
        $stm = $pdo->prepare($sql);
        if ($stm->execute()) {
            return true;
        }
    }
    public static function getAllUserBlacklist($pdo)
    {
        $sql = "SELECT * FROM account WHERE blacklist=1";
        $stm = $pdo->prepare($sql);
        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'auth');
            return $stm->fetchAll();
        }
    }
    public static function getAllUser($pdo)
    {
        $sql = "SELECT * FROM account WHERE role != 1 and blacklist=0";
        $stm = $pdo->prepare($sql);
        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'auth');
            return $stm->fetchAll();
        }
    }
    public static function getUserByUsername($pdo, $username)
    {
        $sql = "SELECT * FROM account WHERE username='$username'";
        $stm = $pdo->prepare($sql);
        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'auth');
            return $stm->fetch();
        }
    }
    public static function getPassword($pdo, $username)
    {
        $selectOne = "SELECT password FROM account WHERE username=:username";
        $stm = $pdo->prepare($selectOne);

        $stm->bindValue(':username', $username, PDO::PARAM_STR);
        if ($stm->execute()) {
            return $stm->fetchColumn();
        }
    }
    public static function checkRole($pdo, $username)
    {
        $checkRole = "SELECT role FROM account WHERE username='" . $username . "'";
        $stm = $pdo->prepare($checkRole);
        $stm->execute();
        return $stm->fetchColumn();
    }
    public function register($pdo)
    {
        $register = "INSERT INTO account(username,password,name,phonenumber,email,address) VALUES (:username,:password,:name,:phonenumber,:email,:address)";
        $stm = $pdo->prepare($register);

        $stm->bindValue(':username', $this->username, PDO::PARAM_STR);
        $stm->bindValue(':password', $this->password, PDO::PARAM_STR);
        $stm->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stm->bindValue(':phonenumber', $this->phonenumber, PDO::PARAM_INT);
        $stm->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stm->bindValue(':address', $this->address, PDO::PARAM_STR);

        if ($stm->execute()) {
            return true;
        }
    }

    public static function checkEmailVerified($pdo, $email)
    {
        $sql = "SELECT * FROM account WHERE email='$email' LIMIT 1";
        $stm = $pdo->prepare($sql);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            return true;
        }
    }
    public static function checkToken($pdo, $token, $username)
    {
        $sql = "SELECT * FROM account WHERE token='$token' and username='$username' LIMIT 1";
        $stm = $pdo->prepare($sql);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            return true;
        }
    }
    public static function createTokenForgotPassword($pdo, $token, $email)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $lasttime =  date('Y-m-d H:i:s', strtotime('+1 hour'));
        $sql = "SET time_zone ='+07:00';UPDATE account SET token='$token', lasttime='$lasttime' WHERE email='$email'";
        $stm = $pdo->prepare($sql);
        if ($stm->execute()) {
            return true;
        }
    }
    public static function resetPassword($pdo, $pass, $username)
    {
        $sql = "UPDATE account SET password='$pass' WHERE username='$username'";
        $stm = $pdo->prepare($sql);
        if ($stm->execute()) {
            $update = "UPDATE account SET token='NULL', lasttime=NULL WHERE username='$username'";
            $stm = $pdo->prepare($update);
            $stm->execute();
            return true;
        }
    }
    public static function checkTime($pdo, $lasstime, $username)
    {
        $sql = "SELECT * FROM account WHERE username='$username'";
        $stm = $pdo->prepare($sql);
        $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        if ($lasstime < $row['lasttime']) {
            return true;
        }
    }
    public static function setNullTime($pdo, $username)
    {
        $update = "UPDATE account set token='NULL', lasttime=null WHERE username='$username'";
        $stm = $pdo->prepare($update);
        if ($stm->execute());
        return true;
    }
    public static function updateInfo($pdo,$name,$email,$phonenumber, $username)
    {
        $sql = "UPDATE account SET name='$name',email='$email',phonenumber='$phonenumber' WHERE username='$username'";
        $stm = $pdo->prepare($sql);
        if ($stm->execute()) {
            return true;
        }
    }
}
