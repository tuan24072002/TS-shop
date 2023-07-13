<?php
class Orderdetail
{
    public int $id;
    public String $image;
    public String $name;
    public String $price;
    public int $quantity;

    public String $orderid;
    public int $productid;


    public static function getOrderDetailByID($pdo,$orderid){
        $select = "SELECT orderid,productid,product.name,orderdetail.price,orderdetail.quantity,product.image_file FROM `orderdetail`,`product` WHERE orderid='$orderid' AND orderdetail.productid=product.id";
        $stm = $pdo->prepare($select);

        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'orderdetail');
            return $stm->fetchAll();
        }
    }
    public static function deleteOrderDetailByID($pdo,$orderid){
        $select = "DELETE FROM `orderdetail` WHERE orderid=:gender";
        $stm = $pdo->prepare($select);
        $stm->bindValue(':gender',$orderid,PDO::PARAM_STR);
        if ($stm->execute()) {
            return true;
        }
    }
    public static function getAllCart($pdo, $username)
    {
        $select = "SELECT * FROM `order` WHERE state='cart' AND username='$username'";
        $stm = $pdo->prepare($select);
        $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        if (!empty($row['orderid'])) {
            $_SESSION['orderid'] = $row['orderid'];
            $sql = "SELECT product.`id`,product.`name`,`image_file`,product.price,orderdetail.quantity,product.quantity as max FROM orderdetail,`order`,product where orderdetail.orderid=`order`.orderid and orderdetail.productid=product.id and `order`.`state`='cart'and `order`.`orderid`='{$row['orderid']}';";
            $stm = $pdo->prepare($sql);
            if ($stm->execute()) {
                $stm->setFetchMode(PDO::FETCH_CLASS, 'Orderdetail');
                return $stm->fetchAll();
            }
        } else {
            return null;
        }
    }
    public static function addOrderDetail($pdo, $orderid, $productid, $quantity)
    {
        $select = "SELECT * FROM product where id='$productid'";
        $stm = $pdo->prepare($select);
        $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);

        $insert = "INSERT INTO orderdetail VALUES ('$orderid','{$row['id']}','$quantity','{$row['price']}')";
        $stm = $pdo->prepare($insert);
        if ($stm->execute()) {
            return true;
        }
    }
    public static function delete($pdo, $proid, $orderid)
    {
        $sql = "DELETE FROM orderdetail WHERE productid='$proid' AND orderid='$orderid'";
        $stm = $pdo->prepare($sql);
        if ($stm->execute()) {
            return true;
        }
    }
    // public function addCart($pdo)
    // {
    //     $sql = "INSERT INTO cart(username,productid,productname,productprice,image,quantity) 
    //     VALUES(:username,:proid,:proname,:proprice,:img,:quantity)";
    //     $stm = $pdo->prepare($sql);
    //     $stm->bindValue(':username', $this->username, PDO::PARAM_STR);
    //     $stm->bindValue(':proid', $this->productid, PDO::PARAM_INT);
    //     $stm->bindValue(':proname', $this->productname, PDO::PARAM_STR);
    //     $stm->bindValue(':proprice', $this->productprice, PDO::PARAM_INT);
    //     $stm->bindValue(':img', $this->image, PDO::PARAM_STR);
    //     $stm->bindValue(':quantity', $this->quantity, PDO::PARAM_INT);
    //     if ($stm->execute()) {
    //         $this->id = $pdo->lastInsertId();
    //         return true;
    //     }
    // }

    public static function checkProductExist($pdo, $proid, $orderid)
    {
        $sql = "SELECT * FROM orderdetail WHERE productid='$proid' and orderid='$orderid' LIMIT 1";
        $stm = $pdo->prepare($sql);
        $stm->execute();
        if ($stm->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
    public static function increaseQuantity($pdo, $quantity, $proid, $orderid)
    {
        $product = "SELECT * FROM product WHERE id='$proid'";
        $stm = $pdo->prepare($product);
        if ($stm->execute()) {
            $row1 = $stm->fetch(PDO::FETCH_ASSOC);
            $totalquantity = $row1['quantity'];
            $select = "SELECT * FROM orderdetail WHERE productid='$proid' and orderid='$orderid'";
            $stm = $pdo->prepare($select);
            if ($stm->execute()) {
                $row = $stm->fetch(PDO::FETCH_ASSOC);
                $newquantity = $row['quantity'] + $quantity;
                if ($newquantity > $totalquantity) {
                    $sql = "UPDATE orderdetail SET quantity='$totalquantity' WHERE productid='$proid' and orderid='$orderid'";
                    $stm = $pdo->prepare($sql);
                    if ($stm->execute()) {
                        return true;
                    }
                } else if ($newquantity <= $totalquantity) {
                    $sql = "UPDATE orderdetail SET quantity='$newquantity' WHERE productid='$proid' and orderid='$orderid'";
                    $stm = $pdo->prepare($sql);
                    if ($stm->execute()) {
                        return true;
                    }
                }
            }
        }
    }
    public static function updateQuantity($pdo, $quantity, $productid, $orderid)
    {
        $select = "SELECT * FROM orderdetail where orderid='$orderid'";
        $stm = $pdo->prepare($select);
        $stm->execute();
        $row1 = $stm->fetch(PDO::FETCH_ASSOC);

        $selectproduct = "SELECT * FROM product where id='{$row1['productid']}'";
        $stm = $pdo->prepare($selectproduct);
        $stm->execute();
        $row2 = $stm->fetch(PDO::FETCH_ASSOC);


        $totalquantity = $row2['quantity'];
        $quantityamount = $totalquantity - $quantity;
        if ($quantityamount >= 0) {
            $updatequantity = "UPDATE product set quantity='$quantityamount' where id='$productid'";
            $stm = $pdo->prepare($updatequantity);
            if ($stm->execute()) {
                return true;
            }
        } else if ($quantityamount < 0) {
            $updatequantity = "UPDATE product set quantity=0 where id='$productid'";
            $stm = $pdo->prepare($updatequantity);
            if ($stm->execute()) {
                return true;
            }
        }
    }
}
