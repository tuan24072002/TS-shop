<?php
require 'inc/header.php';
if(isset($_SESSION['login'])){
require 'class/Database.php';
require 'class/Product.php';
$db = new Database();
$pdo = $db->connectDB();
$data = Product::getAll($pdo);
?>
<style>
    tr td {
        height: 100px;
    }

    tr:hover {
        font-weight: 420;
        color: red;
    }

    tr td img {
        text-align: center;
    }

    tr td img:hover {

        width: 75px;
        height: 75px;
    }
</style>
<div style="display: flex;">
    <h1>Welcome to Admin Page</h1>
    <span style="width: 20%;">
        <a href="addnewproduct.php" class="btn btn-warning" style="margin-top: 6%; width: 50%;">Add new product</a>
    </span>
</div>


<div class="product">
    <form action="" method="post">
        <table class="table table-primary">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Gender</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $product) : ?>
                    <tr>
                        <?php foreach (get_object_vars($product) as $key => $value) : ?>
                            <? if ($key != 'id') : ?>
                                <?php if ($key == 'giasp') : ?>
                                    <td>$<?= $value ?></td>
                                <?php elseif ($key == 'tensp') : ?>
                                    <td><?= $value ?></td>
                                <?php elseif ($key == "motasp") : ?>
                                    <td><?= $value ?></td>
                                <?php elseif ($key == "hinhanhsanpham") : ?>
                                    <td><a href="<?= $value ?>"><img src="<?= $value ?>" width="50px" height="50px" alt=""></a></td>
                                <?php elseif ($key == 'idsanpham' && $product->idsanpham == 1) : ?>
                                    <td>Men</td>
                                <?php elseif ($key == 'idsanpham' && $product->idsanpham == 2) : ?>
                                    <td>Women</td>
                                <?php else : ?>
                                    <td><?= $value ?></td>
                                <?php endif; ?>
                            <? endif; ?>
                        <?php endforeach; ?>
                        <td>
                            <a href="./deleteproduct.php?id=<?= $product->id ?>" style="width:5%;text-decoration: none; color: red;font-weight: bold;"> Delete/</a>
                            <a href="./editproduct.php?id=<?= $product->id ?>" style="width:5%;text-decoration: none;color: blue;font-weight: bold;"> Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>
<?php require 'inc/footer.php'; ?>
<?php
}else{
    header('location: index.php');
}?>