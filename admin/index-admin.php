<?php
require 'inc/header-admin.php';
if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    require "./inc/init.php";
    $data = Product::getAll($pdo);
    $product_per_page = 6;
    $totalProduct = Product::countProduct($pdo)['totalProduct'];
    $totalPages = ceil($totalProduct / $product_per_page);

    $page = $_GET['page'] ?? 1;
    $limit = $product_per_page;
    $offset = ($page - 1) * $product_per_page;
    $data = Product::getProductPerPage($pdo, $limit, $offset);
    if ($page < 1) {
        header('location: index-admin.php?page=1');
        exit;
    }
    if ($page > $totalPages) {
        header('location: index-admin.php?page=' . $totalPages);
    }
?>
    <link rel="stylesheet" href="./style/index-admin.css" media="screen">
    <div style="display: flex;">
        <h3>Admin Page</h3><span><a href="new-product.php" class="btn btn-warning" style="width: 200px;text-decoration: none;font-weight: bold; margin-top:15%; margin-left:5%;"> Add new product</a></span>
    </div>
    <table class="table table-primary">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th style="width: 5%;">Price</th>
                <th style="width: 5%;">Image</th>
                <th style="width: 5%;">Gender</th>
                <th style="width: 5%;">Quantity</th>
                <th style="width: 5%;">State</th>
                <th style="width: 7%;">Function</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $product) : ?>
                <tr>
                    <?php foreach (get_object_vars($product) as $key => $value) : ?>
                        <?php if ($key != 'id') : ?>
                            <?php if ($key == 'price') : ?>
                                <td>$<?= $value ?></td>
                            <?php elseif ($key == 'name') : ?>
                                <td style="font-weight: bold;"><?= $value ?></td>
                            <?php elseif ($key == "description") : ?>
                                <td><?= $value ?></td>
                            <?php elseif ($key == "image_file") : ?>
                                <td><a href="../<?= $value ?>"><img src="../<?= $value ?>" width="70px" height="70px" alt=""></a></td>
                            <?php elseif ($key == 'gender' && $product->gender == 0) : ?>
                                <td>Men</td>
                            <?php elseif ($key == 'gender' && $product->gender == 1) : ?>
                                <td>Women</td>
                            <?php else : ?>
                                <td><?= $value ?></td>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td>
                        <a href="delete-product.php?id=<?= $product->id ?>" style="width:5%;text-decoration: none; color: red;font-weight: bold;"> Delete/</a>
                        <a href="edit-product.php?id=<?= $product->id ?>" style="width:5%;text-decoration: none;color: blue;font-weight: bold;"> Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div style="text-align:center" ;>
        <div class="pagination">
            <a href="index-admin.php?page=<?= $page - 1 ?>">
                < </a>
                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                        <a href="index-admin.php?page=<?= $i; ?>" <?= ($i == $page) ? 'class="active"' : ''; ?>><?= $i; ?></a>
                    <?php endfor; ?>
                    <a href="index-admin.php?page=<?= $page + 1 ?>">></a>
        </div>

        <style>
            span a {
                color: #000;
                font-size: 30pt;
                text-decoration: none;
                font-weight: bold;
            }

            .perpage {
                width: 100%;
                text-align: center;
            }

            tr:hover {
                color: red;
            }

            tr td img {
                text-align: center;
            }

            .pagination {
                display: inline-block;
                margin-bottom: 10px;
                font-weight: bold;
            }

            .pagination a {
                color: black;
                float: left;
                padding: 8px 16px;
                text-decoration: none;
                transition: background-color .3s;
                border: 2px solid #333333;
                background-color: #ffffff;
                margin: 0 4px;
                border-radius: 10px;
                width: 50px;
            }

            .pagination a:focus {
                background-color: #333333;
                color: white;
                border-radius: 10px;
                width: 50px;
            }

            .pagination a.active {
                background-color: #333333;
                color: white;
                border-radius: 10px;
                width: 50px;
            }
        </style>
    <?php require 'inc/footer-admin.php';
} else {
    header('location: ../index.php');
}
    ?>