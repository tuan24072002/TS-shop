<?php
require 'inc/header-admin.php';
    require "./inc/init.php";
if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    $data = Order::getAllOrder($pdo);//Lỗi nè
?>
    <style>
        th {
            text-align: center;
        }

        td {
            text-align: center;
        }
    </style>
    <h3>Order</h3>
    <table class="table table-primary">
        <thead class="table-dark">
            <tr>
                <th>Order ID</th>
                <th>Username</th>
                <th>Date</th>
                <th>Total</th>
                <th>State</th>
                <th>Payment</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Status</th>
                <th style="width: 225px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $order) : ?>
                <tr>
                            <td><?= $order['orderid'] ?></td>

                            <td><?= $order['username'] ?></td>
                            
                            <td><?= $order['date']  ?></td>
                            
                            <?php if(!empty($order['total'])):?>
                            <td>$<?= $order['total']  ?></td>
                            <?php else:?>
                            <td>Payment not confirmed</td>
                            <?php endif;?>
                            <td><?= $order['state']  ?></td>
                            <td><?= $order['payment']  ?></td>
                            <td><?= $order['name']  ?></td>
                            <td><?= $order['phonenumber']  ?></td>
                            <td><?= $order['address']  ?></td>
                            <td><?= $order['status']  ?></td>
                            
                    
                    <td>
                        <a href="delete-order.php?orderid=<?= $order['orderid'] ?>" style="width:5%;text-decoration: none; color: red;font-weight: bold;"> Delete</a>
                        <a href="update-status.php?orderid=<?= $order['orderid'] ?>" style="width:5%;text-decoration: none;color: blue;font-weight: bold;">/ Update Status</a>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
<?php require 'inc/footer-admin.php';
} else {
    header('location: ../index.php');
} ?>