<?php
if (!isset($_GET['id'])) {
    header('location:index.php');
}
require 'inc/header-orther.php';
require './inc/init.php';
$id = $_GET['id'];
$detail = Product::getOneByID($pdo, $id);
if (!$detail) {
    die('ID is invalid !!!');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    if (isset($_SESSION['login'])) {
        $username = $_SESSION['login'];
        if ($detail->quantity == 0) {
            echo '<script>alert("This product is sold out !!!"); window.location.href = "./detail.php?id=' . $detail->id . '";</script>';
            exit;
        } else {
            $quantity = $_POST['quantity'];
            if ($quantity > $detail->quantity) {
                $quantity = $detail->quantity;
            }
        }
        if (Order::CheckOrderExist($pdo, $username) != null) {
            $orderid = Order::CheckOrderExist($pdo, $username);
            if (OrderDetail::checkProductExist($pdo, $id, $orderid) == true) {
                if (OrderDetail::increaseQuantity($pdo, $quantity, $id, $orderid)) {
                    header('location: ./cart.php');
                }
            } else {
                if (OrderDetail::addOrderDetail($pdo, $orderid, $id, $quantity)) {
                    header('location: ./cart.php');
                }
            }
        } else {
            if (Order::addOrder($pdo, $username) != null) {
                $orderid = Order::addOrder($pdo, $username);
                if (OrderDetail::addOrderDetail($pdo, $orderid, $id, $quantity)) {
                    header('location: ./cart.php');
                }
            }
        }
    } else {
        header('location: ./login.php');
    }
}


?>
<style>
    .image-container {
        position: relative;
        display: inline-block;
    }

    .image-container img {
        cursor: pointer;
    }

    .image-container .zoomed-image {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 100%;
        max-height: 100%;
        z-index: 9999;
        display: none;
        background-color: black;

    }
</style>
<script>
    function zoomImage(image) {
        var zoomedImg = image.nextElementSibling;
        zoomedImg.style.display = "block";
    }

    function unzoomImage(zoomedImg) {
        zoomedImg.style.display = "none";
    }
</script>
<link rel="stylesheet" href="./style/detail.css" media="screen">
<section class="u-clearfix u-section-1" id="sec-c20b">
    <?php if ($detail->quantity == 0) : ?><img style="width:10%;position:absolute;z-index: 1;right:0;left:24.3%;top:5.5%;" src="./images/sold.png"><?php endif; ?>
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="image-container">
            <img class="u-image u-image-contain u-image-default u-image-1" src="<?= $detail->image_file ?>" alt="" data-image-width="864" data-image-height="1080" onclick="zoomImage(this)">
            <img class="zoomed-image" src="<?= $detail->image_file ?>" alt="Zoomed Image" onclick="unzoomImage(this)">
        </div>
        <div class="u-container-style u-group u-white u-group-1">
            <div class="u-container-layout">
                <div class="u-form u-form-1">
                    <form method="post" style="padding: 15px" source="email">
                        <div class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form">
                            <div class="u-form-email u-form-group u-label-none">
                                <input type="number" value="1" id="email-558c" name="quantity" class="u-input u-input-rectangle u-text-black" required="">
                            </div>
                            <div class="u-align-left u-form-group u-form-submit u-label-none">
                                <input type="submit" name="submit" value="submit" class="u-form-control-hidden">
                                <div class="btn-addtocart">
                                    <a href="#" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-grey-70 u-hover-grey-15 u-radius-50 u-btn-1"><i class="fa-duotone fa-cart-shopping fa-bounce"></i>&nbsp;&nbsp;&nbsp;Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <h3 class="u-text u-text-grey-70 u-text-1"><?= $detail->name ?><br>
        </h3>
        <h5 class="u-text u-text-grey-70 u-text-2"><span class="u-text-custom-color-1">Quantity: <?= $detail->quantity ?></span></h5>
        <h5 class="u-text u-text-grey-70 u-text-2"><?= $detail->description ?><br>
            <br> Shipping*<br>To get accurate shipping information&nbsp;Edit Location<br>
            <br>Free Pickup<br>Find a Store*Faster Shipping options may be available<br>
            <br>Shown: Iron Grey/Dark Smoke Grey/Black/White<br>Style: CN8490-002<br>
            <br>
            <span class="u-text-custom-color-1">$<?= $detail->price ?></span>
        </h5>
    </div>
</section>
<style>
    .btn-addtocart {
        width: 100%;
        position: absolute;
        left: 25%;
        right: 25%;
    }

    .btn-addtocart a {
        font-size: 15pt;
    }
</style>
<?php require 'inc/footer.php'; ?>