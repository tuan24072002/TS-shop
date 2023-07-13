<?php
require 'inc/header.php';
if(isset($_SESSION['login'])){
require 'class/Database.php';
require 'class/Product.php';

$name = $price = $image = $desc = $idsanpham = $nameError = $descError = $priceError = $imageError = $idsanphamError = "";
$idsanpham=-1;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $nameError = "Name is required";
    } else {
        $name = $_POST['name'];
    }
    if (empty($_POST['desc'])) {
        $descError = "Describe is required";
    } else {
        $desc = $_POST['desc'];
    }
    if (empty($_POST['price'])) {
        $priceError = "Price is required";
    } else {
        $price = $_POST['price'];
    }
    if (empty($_POST['image'])) {
        $imageError = "Image is required";
    } else {
        $image = $_POST['image'];
    }
    if(empty($_POST['idsanpham'])){
        $idsanphamError="Category is required";
    }
    else{
        $idsanpham=$_POST['idsanpham'];
    }
    if (!empty($_POST['name']) && !empty($_POST['desc']) && !empty($_POST['price']) && !empty($_POST['image'])) {
        $db = new Database();
        $pdo = $db->connectDB();
        $product = new Product();
        $product->tensp = $name;
        $product->giasp = $price;
        $product->hinhanhsanpham = $image;
        $product->motasp = $desc;
        $product->idsanpham = $idsanpham;
        if ($product->create($pdo)) {
            header("location: product.php");
            exit;
        }
    }
}
?>
<h1 style="margin-left: 25%;"><b>Add new product</b></h1>
<form method="post" class="w-50 m-auto">
    <table>
        <tr>
            <td>
                <div class="mb-3">
                    <label for="name" class="form-label">Name (*)</label>
                </div>
            </td>
            <td>
                <input type="text" name="name" id="name" class="form-control" value="<?=$name?>">
                <div style="color: red;"><b><?= $nameError ?></b></div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="mb-3">
                    <label for="desc" class="form-label">Descriptrion (*)</label>
                </div>
            </td>
            <td>
                <textarea name="desc" id="desc" cols="30" rows="5"><?=$desc?></textarea>
                <div style="color: red;"><b><?= $descError ?></b></div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="mb-3">
                    <label for="price" class="form-label">Price (*)</label>
                </div>
            </td>
            <td>
                <input type="number" name="price" id="price" class="form-control"  value="<?=$price?>">
                <div style="color: red;"><b><?= $priceError ?></b></div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="mb-3">
                    <label for="image" class="form-label">Image link (*)</label>
                </div>
            </td>
            <td>
                <input type="text" name="image" id="image" class="form-control"  value="<?=$image?>">
                <div style="color: red;"><b><?= $imageError ?></b></div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="mb-3">
                    <label for="idsanpham" class="form-label">Category (*)</label>
                </div>
            </td>
            <td>
                <select name="idsanpham" id="idsanpham" class="form-control">
                    <option value="" selected>Select...</option>
                    <option value="1">Nike For Men</option>
                    <option value="2">Nike For Women</option>
                </select>
                <div style="color: red;"><b><?= $idsanphamError ?></b></div>
            </td>
        </tr>
    </table>
    <div style="margin-left: 24%;margin-top: 5%;">
        <input type="submit" name="submit" id="submit" value="Submit">
        <input type="reset" value="Reset">
    </div>
</form>
<? require 'inc/footer.php'; ?>
<?php
}else{
    header('location: index.php');
}?>