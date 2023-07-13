<?php
require 'inc/header.php';
if(isset($_SESSION['login'])){
require 'class/Database.php';
require 'class/OrderDetail.php';
$id = $_GET['id'];
$db = new Database();
$pdo = $db->connectDB();
$detail = OrderDetail::getAll($pdo,$id);
?>
<style>
    tr:hover{
        color: red;
        font-weight: bold;
    }
</style>
<form>
    <table class="table table-light">
        <thead class="table-dark">
            <tr>
                <th>Order code</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detail as $orderdetail) : ?>
                <tr>
                    <?php foreach (get_object_vars($orderdetail) as $key => $value) : ?>
                        <?php if ($key == 'madonhang') : ?>
                            <td><?= $value ?></td>
                        <?php elseif ($key == 'tensanpham') : ?>
                            <td><?= $value ?></td>
                        <?php elseif ($key == "giasanpham") : ?>
                            <td>$<?= $value ?></td>
                        <?php elseif ($key == "hinhsanpham") : ?>
                            <td><a href="<?= $value ?>"><img src="<?= $value ?>" width="50px" height="50px"></a></td>
                        <?php elseif ($key == "soluongsanpham") : ?>
                            <td><?= $value ?></td>
                        <?php elseif ($key == "ngaydathang") : ?>
                            <td><?= $value ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>
<a href="order.php" class="btn btn-warning"style="width:5%;"><- Back</a>
<?require 'inc/footer.php';?>
<?php
}else{
    header('location: index.php');
}?>