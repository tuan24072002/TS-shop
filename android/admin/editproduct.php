<?php
require './inc/header.php';
if(isset($_SESSION['login'])){
require './class/Database.php';
require './class/Product.php';
$db = new Database();
$pdo = $db->connectDB();
$id = $_GET['id'];
$edit = Product::getOneByID($pdo, $id);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['desc']) && !empty($_POST['price'])) {
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $idsanpham = $_POST['idsanpham'];
        $update = new Product();
        $update->tensp = $name;
        $update->motasp = $desc;
        $update->giasp = $price;
        $update->hinhanhsanpham = $image;
        $update->idsanpham = $idsanpham;
        if ($update->edit($pdo, $id)) {
            header("location: product.php");
        }
    }
}
?>
<h1 style="margin-left: 25%;"><b>Edit product</b></h1>
<form method="post" class="w-50 m-auto" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <div class="mb-3">
                    <label for="name" class="form-label">Name (*)</label>
                </div>
            </td>
            <td>
                <input type="text" name="name" id="name" class="form-control" value="<?= $edit->tensp ?>">
            </td>
        </tr>
        <tr>
            <td>
                <div class="mb-3">
                    <label for="desc" class="form-label">Descriptrion (*)</label>
                </div>
            </td>
            <td>
                <textarea name="desc" id="desc" cols="30" rows="5"><?= $edit->motasp ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <div class="mb-3">
                    <label for="price" class="form-label">Price (*)</label>
                </div>
            </td>
            <td>
                <input type="number" name="price" id="price" class="form-control" value="<?= $edit->giasp ?>">
            </td>
        </tr>
        <tr>
            <td>
                <div class="mb-3">
                    <label for="image" class="form-label">Image link (*)</label>
                </div>
            </td>
            <td>
                <input type="text" name="image" id="image" class="form-control" value="<?= $edit->hinhanhsanpham ?>">
            </td>
        </tr>
        <tr>
            <td>
                <div class="mb-3">
                    <label for="idsanpham" class="form-label">Category (*)</label>
                </div>
            </td>
            <td>
                <select name="idsanpham" id="idsanpham">
                    <?php if ($edit->idsanpham == 1) : ?>
                        <option value="1" selected>Nike For Men</option>
                        <option value="2">Nike For Women</option>
                    <?php elseif ($edit->idsanpham == 2) : ?>
                        <option value="1">Nike For Men</option>
                        <option value="2" selected>Nike For Women</option>
                    <?php endif; ?>
                </select>
            </td>
        </tr>
    </table>
    <div style="margin-left: 22%;">
        <a href="product.php" class="btn btn-warning"><- Back</a>
                <input type="submit" name="submit" id="submit" value="Save" class="btn btn-danger" onclick="return confirm('Are you sure you wanna update the information ???');">
    </div>
</form>
<?php require 'inc/footer.php' ?>
<?php
}else{
    header('location: index.php');
}?>