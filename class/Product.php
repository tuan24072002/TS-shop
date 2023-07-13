<?php
class Product
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $image_file;
    public $gender;
    public $quantity;
    public $state;
        public static function sortASC($pdo){
        $select = "SELECT * FROM product ORDER BY price ASC";
        $stm = $pdo->prepare($select);
        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'product');
            return $stm->fetchAll();
        }
    }
    public static function sortDESC($pdo){
        $select = "SELECT * FROM product ORDER BY price DESC";
        $stm = $pdo->prepare($select);
        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'product');
            return $stm->fetchAll();
        }
    }
    public static function search($pdo,$search)
    {
        $select = "SELECT * FROM product WHERE name LIKE '$search%' OR name LIKE '%$search' OR name LIKE '%$search%' OR description LIKE '$search%' OR description LIKE '%$search' OR price LIKE '$search' OR quantity LIKE '$search' OR state LIKE '$search%' OR state LIKE '%$search'";
        $stm = $pdo->prepare($select);

        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'product');
            return $stm->fetchAll();
        }
    }
    public static function getAll($pdo)
    {
        $select = "SELECT * FROM product";
        $stm = $pdo->prepare($select);
        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'product');
            return $stm->fetchAll();
        }
    }
    public static function getByGender($pdo,$gender)
    {
        $select = "SELECT * FROM product WHERE gender='$gender'";
        $stm = $pdo->prepare($select);
        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'product');
            return $stm->fetchAll();
        }
    }
    public static function getProductFeatured($pdo,$id){
        $select = "SELECT * FROM product WHERE id=:id";
        $stm = $pdo->prepare($select);
        $stm->bindValue(':id',$id,PDO::PARAM_INT);
        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'product');
            return $stm->fetchAll();
        }
    }
    public static function getOneByID($pdo, $id)
    {
        $select_one = "SELECT * FROM product WHERE id=:id";
        $stm = $pdo->prepare($select_one);

        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stm->fetch();
        }
    }
    public function create($pdo)
    {
        $insert = "INSERT INTO product(name, description, price,image_file,gender,quantity) values(:name,:desc,:price,:image,:gender,:quantity)";
        $stm = $pdo->prepare($insert);
        $stm->bindValue(':quantity', $this->quantity, PDO::PARAM_INT);
        $stm->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stm->bindValue(':desc', $this->description, PDO::PARAM_STR);
        $stm->bindValue(':price', $this->price, PDO::PARAM_INT);
        $stm->bindValue(':image', $this->image_file, PDO::PARAM_STR);
        $stm->bindValue(':gender', $this->gender, PDO::PARAM_INT);
        if ($stm->execute()) {
            $this->id = $pdo->lastInsertId();
            return true;
        }
    }
    public static function delete($pdo, $id)
    {
        $delete = "DELETE FROM product WHERE id=:id";
        $stm = $pdo->prepare($delete);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            return true;
        }
    }
    public function edit($pdo, $id)
    {
        $update = "UPDATE product SET name=:name,description=:desc,price=:price,gender=:gender,image_file=:img,quantity=:quantity WHERE id=:id";
        $stm = $pdo->prepare($update);
        $stm->bindValue(':quantity', $this->quantity, PDO::PARAM_INT);
        $stm->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stm->bindValue(':desc', $this->description, PDO::PARAM_STR);
        $stm->bindValue(':price', $this->price, PDO::PARAM_INT);
        $stm->bindValue(':img', $this->image_file, PDO::PARAM_STR);
        $stm->bindValue(':gender', $this->gender, PDO::PARAM_INT);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stm->execute()) {
            return true;
        }
    }
    public static function getProductPerPage($pdo,$limit,$offset){
        $sql="SELECT * FROM product ORDER BY id limit :limit offset :offset";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stm->bindValue(':offset', $offset, PDO::PARAM_INT);
        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stm->fetchAll();
        }
    }
    public static function getProductPerPageGender($pdo,$limit,$offset,$gender){
        $sql="SELECT * FROM product WHERE gender=:gender ORDER BY id limit :limit offset :offset";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stm->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stm->bindValue(':gender', $gender, PDO::PARAM_INT);
        if ($stm->execute()) {
            $stm->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stm->fetchAll();
        }
    }
    public static function countProduct($pdo)
    {
        $sql="SELECT count(id) AS 'totalProduct' FROM product";
        $stm=$pdo->prepare($sql);
        if($stm->execute())
        {
            return $stm->fetch(PDO::FETCH_ASSOC);
        }
    }
    public static function countProductGender($pdo, $gender)
    {
        $sql="SELECT count(id) AS 'totalProduct' FROM product WHERE gender='$gender'";
        $stm=$pdo->prepare($sql);
        if($stm->execute())
        {
            return $stm->fetch(PDO::FETCH_ASSOC);
        }
    }
    public static function deleteImage($pdo,$productid){
        $sql="UPDATE product set image_file='NULL' WHERE id='$productid'";
        $stm=$pdo->prepare($sql);
        if($stm->execute())
        {
            return true;
        }
    }
}
