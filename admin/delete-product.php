<?php
require 'inc/header-admin.php';
if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    require "./inc/init.php";
    if (empty($_GET['id'])) {
        header('location: ./index-admin.php');
    }
    $id = $_GET['id'];
    $detail = Product::getOneByID($pdo, $id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        if (Product::delete($pdo, $id)) {
            unlink('../' . $detail->image_file);
            header('location: index-admin.php');
            exit;
        }
    }
?>
    <h2><b>Delete Product</b></h2>
    <form action="" method="post">
        <table class="table mt-3">
            <tr>
                <th style="background-color: black;color:white;">Name</th>
                <td style="font-weight: bold;"><?= $detail->name; ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Desciption</th>
                <td style="font-weight: bold;"><?= $detail->description; ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Price</th>
                <td style="font-weight: bold;">$<?= $detail->price ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Gender</th>
                <?php if ($detail->gender == 0) : ?>
                    <td style="font-weight: bold;">Men</td>
                <?php else : ?>
                    <td style="font-weight: bold;">Women</td>
                <?php endif; ?>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Quantity</th>
                <td style="font-weight: bold;"><?= $detail->quantity ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">State</th>
                <td style="font-weight: bold;"><?= $detail->state ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Image</th>

                <td><img src="../<?= $detail->image_file; ?>" weight="100px" height="250px" alt=""></td>
            </tr>
        </table>
        <a href="index-admin.php" class="btn btn-warning" style="width:5%;"><- Back</a>
                <input type="submit" name="submit" id="submit" value="Delete" class="btn btn-danger" onclick="return(confirm('Are you sure wanna delete this product?'));">
    </form>
<?php require 'inc/footer-admin.php';
} else {
    header('location: ../index.php');
} ?>