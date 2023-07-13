<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  require 'send-email.php';
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mail->AddAddress("0995086534ts@gmail.com");
  $mail->SetFrom($email, $name);
  $mail->Subject = "Customers register to receive 10% voucher";
  $content = "<b style=" . 'color:red;' . ">Name: </b>" . $name . "<br><b style=" . 'color:red;' . ">Email: </b>" . $email;
  $mail->MsgHTML($content);
  if ($mail->Send()) {
    echo '<script>alert("Successful !!!"); window.location.href = "./index.php";</script>';
  }
}
?>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="description" content="">
  <title>TS Shop</title>
  <link rel="stylesheet" href="./style/nicepage.css" media="screen">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
  <link rel="icon" type="image/png" href="../images/shoes.png">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
  <script class="u-script" type="text/javascript" src="script/jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="script/nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 5.7.9, nicepage.com">
  <meta name="referrer" content="origin">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Page 1">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body class="u-body u-xl-mode" data-lang="en">
  <header class="u-black u-clearfix u-header u-sticky u-sticky-ef01 u-header" id="sec-440b">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h3 class="u-text u-text-body-alt-color u-text-default u-text-1">
        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-dialog-link u-hover-none u-none u-text-white u-btn-1" href="#carousel_6c29">TS Shop<br>
        </a>
      </h3>
      <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-responsive-from="MD">
        <div class="u-custom-menu u-nav-container">
          <ul class="u-nav u-spacing-30 u-unstyled u-nav-1">
            <li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-text-white" href="./#sildeshow" style="padding: 10px 0px;">Home</a>
            </li>
            <li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-text-white" href="product.php" style="padding: 10px 0px;">Product</a>
            </li>
            <li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-text-white" href="./#carousel_16e5" style="padding: 10px 0px;">Contact</a>
            </li>
            <li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-text-white" href="./#aboutus" style="padding: 10px 0px;">About us</a>
            </li>
            <?php
            ob_start();
            session_start();
            if (isset($_SESSION['login'])) :
            ?>
              <li class="u-nav-item">
                <a href="#" class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-text-white" style="padding: 10px 0px;">Welcome - <?= $_SESSION['login'] ?></a>
                <div class="u-nav-popup">
                  <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">
                    <li class="u-nav-item"><a class="u-button-style u-grey-5 u-hover-black u-nav-link u-text-black u-text-hover-white" href="./change-info.php"><i class="fa-solid fa-user fa-beat-fade"></i>&nbsp;&nbsp;&nbsp;Change information</a></li>
                    <li class="u-nav-item"><a class="u-button-style u-grey-5 u-hover-black u-nav-link u-text-black u-text-hover-white" href="./logout.php"><i class="fa-solid fa-right-from-bracket fa-beat-fade"></i>&nbsp;&nbsp;&nbsp;Logout</a></li>
                  </ul>
                </div>
              </li>
              <li class="u-nav-item">
                <a href="cart.php" class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-text-white" style="padding: 10px 0px;"><i class="fa-solid fa-cart-shopping fa-bounce" style="font-size: 15pt;"></i></a>
              </li>
            <?php else : ?>
              <li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-text-white" href="login.php" style="padding: 10px 0px;">Login</a>
              </li>
            <?php endif; ?>
          </ul>

        </div>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-inner-container-layout u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="../test/#sildeshow">Home</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="../test/#products">Product</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="../test/#carousel_16e5">Contact</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="../test/#aboutus">About us</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="logout.php">Logout</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="#">>Welcome - <?= $_SESSION['login'] ?></a>
                </li>

                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="login.php">Login</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav>
      <form action="search.php" method="get" class="u-border-1 u-border-grey-30 u-hidden-xs u-search u-search-left u-white u-search-1">
        <button class="u-search-button" type="submit">
          <span class="u-search-icon u-spacing-10">
            <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 56.966 56.966">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-b0ba"></use>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-b0ba" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" class="u-svg-content">
              <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
              </path>
            </svg>
          </span>
        </button>
        <input class="u-search-input" type="search" name="search" value="" placeholder="Search">
      </form>
    </div>
    <section class="u-align-center u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-60 u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xl u-dialog-section-10 u-dialog-open" id="carousel_6c29">
      <div class="u-align-center u-container-style u-dialog u-opacity u-opacity-55 u-radius-11 u-shape-round u-white u-dialog-1">
        <div class="u-container-layout u-container-layout-1">
          <img alt="" class="u-image u-image-contain u-image-default u-image-1" data-image-width="1000" data-image-height="1200" src="images/popup.png" data-lang-en="">
          <div class="u-align-center u-container-style u-group u-shape-rectangle u-group-1" data-animation-name="" data-animation-duration="0" data-animation-direction="">
            <div class="u-container-layout u-valign-top u-container-layout-2">
              <h4 class="u-align-center u-text u-font-regardant u-custom-font u-text-custom-color-1 u-text-1" data-lang-en="&ZeroWidthSpace;Fill in the information to receive a 10% discount voucher!"> Fill in the information to receive a 10% discount voucher!</h4>
              <div class="u-form u-form-1">
                <form method="post" style="padding: 10px" source="email" name="form">
                  <div class="u-clearfix u-form-spacing-23 u-form-vertical u-inner-form">
                    <div class="u-form-group u-form-name u-form-group-1">
                      <label class="u-form-control-hidden u-label" data-lang-en="Name">Name</label>
                      <input type="text" placeholder="Enter your Name" id="name-9cc4" name="name" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-radius-15" required="" data-lang-en="Enter your Name">
                    </div>
                    <div class="u-form-email u-form-group u-form-group-2">
                      <label class="u-form-control-hidden u-label" data-lang-en="Email">Email</label>
                      <input type="email" placeholder="Enter your Email" id="email-9cc4" name="email" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-radius-15" required="" data-lang-en="Enter a valid email address">
                    </div>
                    <div class="u-align-center u-form-group u-form-submit u-form-group-3">
                      <a href="#" class="u-black u-btn u-btn-round u-btn-submit u-button-style u-radius-28 u-btn-1" data-lang-en="{&quot;content&quot;:&quot;Submit&quot;,&quot;href&quot;:&quot;#&quot;}">Submit</a>
                      <input type="submit" name="submit" value="submit" class="u-form-control-hidden">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div><button class="u-dialog-close-button u-icon u-text-black u-icon-1">
          <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 409.806 409.806">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-4e2d"></use>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 409.806 409.806" x="0px" y="0px" id="svg-4e2d" style="enable-background:new 0 0 409.806 409.806;">
            <g>
              <g>
                <path d="M228.929,205.01L404.596,29.343c6.78-6.548,6.968-17.352,0.42-24.132c-6.548-6.78-17.352-6.968-24.132-0.42    c-0.142,0.137-0.282,0.277-0.42,0.42L204.796,180.878L29.129,5.21c-6.78-6.548-17.584-6.36-24.132,0.42    c-6.388,6.614-6.388,17.099,0,23.713L180.664,205.01L4.997,380.677c-6.663,6.664-6.663,17.468,0,24.132    c6.664,6.662,17.468,6.662,24.132,0l175.667-175.667l175.667,175.667c6.78,6.548,17.584,6.36,24.132-0.42    c6.387-6.614,6.387-17.099,0-23.712L228.929,205.01z"></path>
              </g>
            </g>
          </svg>
        </button>
      </div>
    </section>
  </header>