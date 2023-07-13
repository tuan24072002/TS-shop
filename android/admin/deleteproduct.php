<?php
require 'inc/header.php';
if(isset($_SESSION['login'])){
require "class/Database.php";
require 'class/Product.php';
$db=new Database();
$pdo=$db->connectDB();
$id=$_GET['id'];
$detail=Product::getOneByID($pdo,$id);
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])){
    if(Product::delete($pdo,$id)){
        header('location: product.php');
        exit;
    }
}
?>
<h2><b>Delete Product</b></h2>
<form action="" method="post">
<table class="table mt-3">
    <tr>
        <th style="background-color: black;color:white;">Name</th>
        <td style="font-weight: bold;"><?= $detail->tensp; ?></td>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">Desciption</th>
        <td style="font-weight: bold;"><?= $detail->motasp; ?></td>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">Price</th>
        <td style="font-weight: bold;">$<?= $detail->giasp ?></td>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">Category</th>
        <?php if ($detail->idsanpham == 1) : ?>
            <td style="font-weight: bold;">Nike For Men</td>
        <?php else : ?>
            <td style="font-weight: bold;">Nike For Women</td>
        <?php endif; ?>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">Image</th>

        <td><img src="<?= $detail->hinhanhsanpham; ?>" weight="100px" height="250px" alt=""></td>
    </tr>
</table>
<a href="product.php" class="btn btn-warning"style="width:5%;"><- Back</a>
<input type="submit" name="submit" id="submit" value="Delete" class="btn btn-danger" onclick="return(confirm('Are you sure wanna delete this product?'));">
</form>
<? require 'inc/footer.php'; ?>
<?php
}else{
    header('location: index.php');
}?>