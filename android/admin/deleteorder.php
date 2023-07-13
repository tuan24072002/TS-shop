<?php
require 'inc/header.php';
if(isset($_SESSION['login'])){
require "class/Database.php";
require 'class/Order.php';
require 'class/OrderDetail.php';
$db = new Database();
$pdo = $db->connectDB();
$id=$_GET['id'];
$order = Order::getOneByID($pdo, $id);
$detail = OrderDetail::getAll($pdo,$id);
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])){
    if(Order::delete($pdo,$id) && OrderDetail::delete($pdo,$id)){
        header('location: order.php');
        exit;
    }
}
?>
<h2><b>Delete Order</b></h2>
<form action="" method="post">
<table class="table mt-3">
<tr>
        <th style="background-color: black;color:white;">ID</th>
        <td style="font-weight: bold;"><?= $order->id; ?></td>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">Username</th>
        <td style="font-weight: bold;"><?= $order->username; ?></td>
    </tr>

    <tr>
        <th style="background-color: black;color:white;">Name</th>
        <td style="font-weight: bold;"><?= $order->name ?></td>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">Phone Number</th>
        <td style="font-weight: bold;"><?= $order->sodienthoai ?></td>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">Address</th>
        <td style="font-weight: bold;"><?= $order->diachi ?></td>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">Total</th>
        <td style="font-weight: bold;">$<?= $order->tonggia ?></td>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">Order date</th>
        <td style="font-weight: bold;"><?= $order->ngaydathang ?></td>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">State</th>
        <td style="font-weight: bold;"><?= $order->trangthai ?></td>
    </tr>
</table>
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
<a href="order.php" class="btn btn-warning"style="width:5%;"><- Back</a>
<input type="submit" name="submit" id="submit" value="Delete" class="btn btn-danger" onclick="return(confirm('Are you sure wanna delete this order?'));">
</form>
<? require 'inc/footer.php'; ?>
<?php
}else{
    header('location: index.php');
}?>