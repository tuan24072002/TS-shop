<?php
require 'inc/header-admin.php';
if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    require "./inc/init.php";
    if (empty($_GET['orderid'])) {
        header('location: ./index-admin.php');
    }
    $orderid = $_GET['orderid'];
    $detail = Order::getOrderByID($pdo, $orderid);
    $data = OrderDetail::getOrderDetailByID($pdo, $orderid);
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        if (Order::deleteOrderByID($pdo, $orderid)) {
            if (OrderDetail::deleteOrderDetailByID($pdo, $orderid)) {
                header('location: ./order.php');
                exit;
            }
        }
    }
?>
    <h2><b>Delete Order</b></h2>
    <form action="" method="post">
        <table class="table mt-3">
            <tr>
                <th style="background-color: black;color:white;">Order ID</th>
                <td style="font-weight: bold;"><?= $detail['orderid']; ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Username</th>
                <td style="font-weight: bold;"><?= $detail['username']; ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Date</th>
                <td style="font-weight: bold;"><?= $detail['date'] ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Total</th>
                <td style="font-weight: bold;">$<?= $detail['total'] ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">State</th>
                <td style="font-weight: bold;"><?= $detail['state'] ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Payment</th>
                <td style="font-weight: bold;"><?= $detail['payment'] ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Name</th>
                <td style="font-weight: bold;"><?= $detail['name'] ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Phone Number</th>
                <td style="font-weight: bold;"><?= $detail['phonenumber'] ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Address</th>
                <td style="font-weight: bold;"><?= $detail['address'] ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Status</th>
                <td style="font-weight: bold;"><?= $detail['status'] ?></td>
            </tr>
        </table>
        <table class="table table-primary">
            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $order) : ?>
                    <tr>
                        <?php foreach (get_object_vars($order) as $key => $value) : ?>
                            <?php if ($key == 'orderid') : ?>
                                <td>$<?= $order->price ?></td>
                            <?php elseif ($key == 'price') : ?>
                                <td><?= $order->productid ?></td>
                            <?php elseif ($key == 'name') : ?>
                                <td><?= $order->orderid ?></td>
                            <?php elseif ($key == 'quantity') : ?>
                                <td><?= $order->name ?></td>
                            <?php elseif ($key == 'productid') : ?>
                                <td><?= $order->quantity ?></td>
                            <?php else : ?>
                                <td><a href="../<?= $value ?>"><img src="../<?= $value ?>" width="70px" height="70px" alt=""></a></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <style>
            .table-primary th {
                text-align: center;
            }

            .table-primary td {
                text-align: center;
            }
        </style>
        <a href="./order.php" class="btn btn-warning" style="width:5%;"><- Back</a>
                <input type="submit" name="submit" id="submit" value="Delete" class="btn btn-danger" onclick="return(confirm('Are you sure wanna delete this order?'));">
    </form>
<?php require 'inc/footer-admin.php';
} else {
    header('location: ../index.php');
} ?>