<?php
require 'inc/header-orther.php';
require './inc/init.php';
if (!empty($_GET['search'])) {
    $search = $_GET['search'];
    $dataSearch = Product::search($pdo, $search);
} else {
    header('Location: index.php');
    exit();
}
?>
<style>
    table .table {
        border-collapse: collapse;

        border-collapse: separate;
    }

    td {
        display: inline-block;
        width: 25%;
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        box-sizing: border-box;

        display: inline-block;
        width: calc(25% - 10px);
        margin: 5px;
        height: 580px;
    }

    td img {
        width: 300px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
<link rel="stylesheet" href="./style/product.css" media="screen">
<section class="u-clearfix u-gradient u-section-2" id="sec-9de5" style="background-image:url('./images/background_product.jpg');">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-expanded-width-lg u-expanded-width-md u-expanded-width-xl u-list u-list-1">
            <div class="u-repeater u-repeater-1">
                <?php foreach ($dataSearch as $product) : ?>
                    <div style=" cursor:pointer;" class="u-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle" onclick="location.href='detail.php?id=<?= $product->id; ?>';">
                        <div class="u-container-layout u-similar-container u-valign-top-lg u-valign-top-xl u-container-layout-2">
                            <div class="u-align-left u-container-style u-group u-radius-10 u-shape-rectangle u-white u-group-2">
                                <?php if($product->quantity==0) :?><img style="width:40%;position:absolute;z-index: 1;right:50%;left:0;top:1%;" src="./images/sold.png"><?php endif; ?>
                                <div class="u-container-layout u-container-layout-3">
                                    <img class="u-border-2 u-border-white u-image u-image-round u-preserve-proportions u-radius-17 u-image-1" src="<?= $product->image_file; ?>" alt="" data-image-width="219" data-image-height="219">
                                    <h4 class="u-text u-text-2 u-custom-font u-font-spy-agency"><?= $product->name; ?></h4>
                                    <h5 class="u-text u-text-3 u-custom-font u-font-spy-agency">Quantity: <?= $product->quantity; ?></h5>
                                    <br />
                                    <p class="u-custom-font u-font-spy-agency u-text u-text-4">$<?= $product->price; ?></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php require 'inc/footer.php'; ?>