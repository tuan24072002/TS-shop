<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="description" content="">
  <title>TS Shop</title>
  <link rel="stylesheet" href="./style/nicepage.css" media="screen">

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
        <a class=" u-active-none u-border-none u-btn u-button-link u-button-style  u-hover-none u-none u-text-white u-btn-1" href="./index.php"><b>TS Shop</b> <br>
        </a>
      </h3>
      <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-responsive-from="MD">
        <div class="u-custom-menu u-nav-container">
          <ul class="u-nav u-spacing-30 u-unstyled u-nav-1">
            <li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-text-white" href="./#sildeshow" style="padding: 10px 0px;">Home</a>
            </li>
            <li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-1 u-text-hover-custom-color-1 u-text-white" href="product.php" style="padding: 10px 0px;">Product</a>
              <!--<div class="u-nav-popup">-->
              <!--  <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">-->
              <!--    <li class="u-nav-item"><a class="u-button-style u-grey-5 u-hover-black u-nav-link u-text-black u-text-hover-white" href="product-formen.php">Nike For Men</a></li>-->
              <!--    <li class="u-nav-item"><a class="u-button-style u-grey-5 u-hover-black u-nav-link u-text-black u-text-hover-white" href="product-forwomen.php">Nike For Women</a></li>-->
              <!--  </ul>-->
              <!--</div>-->
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
  </header>