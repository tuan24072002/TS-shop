<?php
require 'inc/header.php';
if(isset($_SESSION['login'])){
require 'class/Database.php';
require 'class/Account.php';
$db = new Database();
$pdo = $db->connectDB();
$data = Account::getAll($pdo);
?>
<style>
    form{
        margin-top: 2%;
    }
    tr:hover {
        font-weight: 420;
        color: red;
    }

    tr td img {
        text-align: center;
    }
</style>
<form action="" method="post">
    <table class="table table-light">
        <thead class="table-dark">
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Name</th>
                <th>Phone number</th>
                <th>Address</th>
                <th>Function</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $product) : ?>
                <tr>
                    <?php foreach ( get_object_vars($product) as $key => $value) : ?>
                        <? if ($key != 'id'&& $key!='role') : ?>
                            <?php if ($key == 'username') : ?>
                                <td><?= $value ?></td>
                            <?php elseif ($key == 'password') : ?>
                                <td><?= $value ?></td>
                            <?php elseif ($key == "name") : ?>
                                <td><?= $value ?></td>
                            <?php elseif ($key == "sodienthoai") : ?>
                                <td><?= $value ?></td>
                            <?php elseif ($key == "diachi") : ?>
                                <td><?= $value ?></td>
                            <?php endif; ?>
                        <? endif; ?>
                    <?php endforeach; ?>
                    <td>
                        <a href="deleteuser.php?id=<?= $product->id ?>" style="width:5%;text-decoration: none; color: red;font-weight: bold;"> Delete/</a>
                        <a href="addtoblacklist.php?id=<?= $product->id ?>" onclick="return confirm('Are you sure you wanna add this user to black list ???')"; style="width:5%;text-decoration: none;color: black;font-weight: bold;"> Add To Blacklist</a>
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