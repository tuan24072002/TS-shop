<?php
require 'inc/header-orther.php';
require './inc/init.php';
if (isset($_SESSION['login'])) {
  if (isset($_SESSION['orderid'])) {
    $orderid = $_SESSION['orderid'];
  }

  $total =  $qtt = 0;
  $discount = '0%';
  $username = $_SESSION['login'];

  $cart = OrderDetail::getAllCart($pdo, $username);
  if ($cart != null) {
    foreach ($cart as $product) {
      $total += $product->quantity * $product->price;
    }
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    if ($_POST['coupon'] == 'tuanseven') {
      header('location: cart.php?discount=10%');
    } elseif ($_POST['coupon'] == 'tuandeptrai') {
      header('location: cart.php?discount=90%');
    } else {
      header('location: cart.php?discount=0%');
    }
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit2'])) {
    $payment = $_POST['radio'];
    if (Order::payment($pdo, $_SESSION['orderid'], $_SESSION['login'], $_POST['total'], $payment)) {

      foreach ($cart as $item) {
        $productid = $item->id;
        $quantityOrderdetail = $item->quantity;
        if (OrderDetail::updateQuantity($pdo, $quantityOrderdetail, $productid, $_SESSION['orderid'])) {
        }
      }
      echo '<script>alert("Order Success !!!"); window.location.href = "./index.php";</script>';
    }
  }
?>
  <style>
    .radio-group {
      margin-top: 2%;
      margin-left: 5%;
      margin-bottom: 5%;
    }

    .radio-group label {
      margin-right: 10%;
    }
  </style>
  <link rel="stylesheet" href="./style/cart.css" media="screen">
  <section class="skrollable u-align-center u-clearfix u-section-1" id="sec-05bd">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h3 class="u-text u-text-default u-text-grey-60 u-text-1">Shopping Cart</h3>
      <div class="u-container-style u-group u-radius-15 u-shape-round u-white u-group-1">
        <div class="u-container-layout u-container-layout-1">
          <div class="u-form u-form-1">
            <form method="POST" source="email" name="form" style="padding: 10px;">
              <div class="u-clearfix u-form-horizontal u-form-spacing-16 u-inner-form">
                <div class="u-form-group u-form-name u-label-top">
                  <label for="coupon" class="u-label">Have coupon?</label>
                  <input type="text" placeholder="Coupon code" id="coupon" name="coupon" class="u-border-none u-grey-10 u-input u-input-rectangle u-radius-10 u-text-black" required="">
                </div>
                <div class="u-align-left u-form-group u-form-submit u-label-top">
                  <a href="#" class="u-border-1 u-border-black u-btn u-btn-round u-btn-submit u-button-style u-hover-black u-none u-radius-10 u-text-black u-text-hover-white u-btn-1">Apply<br>
                  </a>
                  <input type="submit" value="submit" name="submit" class="u-form-control-hidden">
                </div>
              </div>
            </form>

          </div>
          <div class="u-border-3 u-border-grey-10 u-line u-line-horizontal u-line-1"></div>
          <div class="u-clearfix u-group-elements u-group-elements-1">
            <div class="u-align-center u-clearfix u-group-elements u-group-elements-2">
              <h4 class="u-text u-text-default u-text-2">Total price:</h4>
              <h4 class="u-text u-text-default u-text-3">Discount:</h4>
              <h4 class="u-text u-text-default u-text-4">Total:</h4>
              <div class="u-align-center u-border-3 u-border-black u-line u-line-horizontal u-line-2"></div>
              <img class="u-align-center u-image u-image-contain u-image-default u-image-1" src="images/card.png" alt="" data-image-width="635" data-image-height="130">
            </div>
            <h4 class="u-text u-text-default u-text-5">$<?= $total; ?></h4>
            <?php if (isset($_GET['discount'])) : ?>
              <h4 class="u-text u-text-default u-text-6"><?= $_GET['discount']; ?></h4>
              <?php if ($total == 0) : ?>
                <h4 class="u-text u-text-default u-text-7">$0</h4>
              <?php else : ?>
                <h4 class="u-text u-text-default u-text-7">$<?= $total -= ($total * (intval($_GET['discount']))) / 100 ?></h4>
              <?php endif; ?>
            <?php else : ?>
              <h4 class="u-text u-text-default u-text-6">0%</h4>
              <h4 class="u-text u-text-default u-text-7">$<?= $total ?></h4>
            <?php endif; ?>

          </div>
          <div class="u-shape u-shape-1"></div>
          <div class="u-opacity u-opacity-0 u-shape u-shape-2"></div>
          <div class="u-shape u-shape-3"></div>
        </div>
      </div>
      <div class="u-container-style u-group u-radius-15 u-shape-round u-white u-group-2">
        <div class="u-container-layout u-container-layout-2">
          <div class="u-shape u-shape-4"></div>
          <div class="u-opacity u-opacity-0 u-shape u-shape-5"></div>
          <div class="u-form u-form-2">
            <form method="post" source="email" name="form-1" style="padding: 10px;">
              <div class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form">
                <div class="u-form-group u-form-name">
                  <label for="radio-group" class="u-label u-label-2">Payment method:</label></br>
                  <div class="radio-group" margin-top:5%>
                    <b>
                      <input type="radio" id="radio1" name="radio" value="Banking" checked>
                      <label for="radio1">Banking</label>
                      <input type="radio" id="radio2" name="radio" value="COD">
                      <label for="radio2">COD</label>
                      <input type="hidden" name="total" id="" value="<?= $total ?>">
                    </b>
                  </div>
                </div>
                <div class="u-align-center u-form-group u-form-submit">
                  <a href="#" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-grey-75 u-hover-grey-60 u-radius-10 u-btn-2">Submit</a>
                  <input type="submit" value="submit" name="submit2" class="u-form-control-hidden">
                </div>
              </div>
            </form>
          </div>
          <div class="u-shape u-shape-6"></div>
        </div>
      </div>
      <div class="u-table u-table-responsive u-table-1">
        <table class="u-table-entity">
          <colgroup>
            <col width="17.5%">
            <col width="22.5%">
            <col width="10.5%">
            <col width="16.5%">
            <col width="16.5%">
            <col width="16.5%">
          </colgroup>
          <thead class="u-align-center u-black u-table-header u-table-header-1">
            <tr style="height: 33px;">
              <th class="u-border-1 u-border-black u-table-cell">Image</th>
              <th class="u-border-1 u-border-black u-table-cell">Name</th>
              <th class="u-border-1 u-border-black u-table-cell">Price</th>
              <th class="u-border-1 u-border-black u-table-cell">Quantity</th>
              <th class="u-border-1 u-border-black u-table-cell">Subtotal</th>
              <th class="u-border-1 u-border-black u-table-cell"></th>
            </tr>
          </thead>
          <tbody class="u-align-center u-table-body">
            <?php if ($cart != null) :
              foreach ($cart as $product) : ?>
                <tr style="height: 30px;">
                  <?php foreach (get_object_vars($product) as $key => $value) :
                    if ($key != 'id') :
                      if ($key == 'name') : ?>
                        <td class="u-border-2 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell">
                          <div class="image-container">
                            <img class="image" src="<?= $product->image_file ?>" width="50px" height="50px" alt="Image" onclick="zoomImage(this)">
                            <img class="zoomed-image" src="<?= $product->image_file ?>" alt="Zoomed Image" onclick="unzoomImage(this)">
                          </div>
                        </td>
                      <?php elseif ($key == 'price') : ?>
                        <td class="u-border-2 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"><a href="./detail.php?id=<?= $product->id ?>"><?= $product->name ?></a></td>
                        <div class="value">
                        <?php elseif ($key == 'image_file') : ?>
                          <td class="u-border-2 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell" style="font-size: 15pt;"><?= $product->quantity ?></td>
                        <?php elseif ($key == 'quantity') : ?>
                          <td class="u-border-2 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"style="font-size: 15pt;">$<?= $product->price ?></td>
                        <?php else : ?>
                          <td class="u-border-2 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell"style="font-size: 15pt;"><?= $product->price *  $product->quantity ?></td>
                        </div>
                        <td class="u-border-2 u-border-grey-30 u-border-no-left u-border-no-right u-table-cell">
                          <a href="delete-cart.php?id=<?= $product->id ?>"><span class="u-file-icon u-icon u-icon-1"><img src="images/1008968.png" width="50px" height="50px"></span></a>
                        </td>
                  <?php endif;
                    endif;
                  endforeach; ?>
                </tr>
            <?php endforeach;
            else :
              echo '<script>alert("Your cart is empty !!!"); window.location.href = "./product.php";</script>';
            endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <style>
    td .image:hover {
      width: 54px;
      height: 54px;
    }

    td a {
      text-decoration: none;
      color: black;
      font-weight: bold;
    }

    td a:hover {
      color: red;
    }

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
      max-width: 90%;
      max-height: 90%;
      z-index: 9999;
      display: none;
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
<?php require 'inc/footer.php';
} else {
  header('location: login.php');
} ?>