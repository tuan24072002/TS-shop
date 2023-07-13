<?php
require 'inc/header.php';
if(isset($_SESSION['login'])){
require 'class/Database.php';
require 'class/Order.php';
$db = new Database();
$pdo = $db->connectDB();
$data = Order::getAll($pdo);
?>
<style>
    form {
        margin-top: 2%;
    }

    tr td a {
        text-decoration: none;
        color: black;
    }

    tr td a:hover {
        font-weight: 420;
        color: red;
    }
</style>
<form action="" method="post">
    <table class="table table-light">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>State</th>
                <th>Function</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $product) : ?>
                <tr>
                    <?php foreach (get_object_vars($product) as $key => $value) : ?>
                        <?php if ($key == 'id') : ?>
                            <td><a href="orderdetail.php?id=<?= $product->id ?>"><?= $value ?></a></td>
                        <?php elseif ($key == 'username') : ?>
                            <td><a href="orderdetail.php?id=<?= $product->id ?>"><?= $value ?></a></td>
                        <?php elseif ($key == "name") : ?>
                            <td><a href="orderdetail.php?id=<?= $product->id ?>"><?= $value ?></a></td>
                        <?php elseif ($key == "sodienthoai") : ?>
                            <td><a href="orderdetail.php?id=<?= $product->id ?>"><?= $value ?></a></td>
                        <?php elseif ($key == "diachi") : ?>
                            <td><a href="orderdetail.php?id=<?= $product->id ?>"><?= $value ?></a></td>
                        <?php elseif ($key == "tonggia") : ?>
                            <td><a href="orderdetail.php?id=<?= $product->id ?>">$<?= $value ?></a></td>
                        <?php else : ?>
                            <td><a href="orderdetail.php?id=<?= $product->id ?>"><?= $value ?></a></td>
                        <?php endif; ?>

                    <?php endforeach; ?>
                    <td>
                        <a href="deleteorder.php?id=<?= $product->id ?>" style="width:5%;text-decoration: none; color: red;font-weight: bold;"> Delete</a>
                        <? if ($product->trangthai == 'Delivery') : ?>
                            <a href="editorder.php?id=<?= $product->id ?>" style="width:5%;text-decoration: none;color: blue;font-weight: bold;">/ Update State</a>
                        <? endif; ?>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>
<?php require 'inc/footer.php'; ?>
<?php
}else{
    header('location: index.php');
}?>