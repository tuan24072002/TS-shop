<?php

require 'inc/header-orther.php';
require './inc/init.php';
$token = $_GET['token'];
$username = $_GET['username'];
$now = date('Y-m-d H:i:s');
if (Auth::checkToken($pdo, $token, $username)) {
  if (Auth::checkTime($pdo, $now, $username)) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
      $newpass = $_POST['newpass'];
      $confirmnewpass = $_POST['confirmnewpass'];
      if ($newpass != $confirmnewpass) {
        echo 'Confirm new pass does not match !!!';
      } else {
        $hash = password_hash($newpass, PASSWORD_DEFAULT);
        if (Auth::resetPassword($pdo, $hash, $username)) {
          if (Auth::setNullTime($pdo, $username)) {
            echo '<script>alert("Reset password successfully !!!"); window.location.href = "./login.php";</script>';
            exit;
          }
        }
      }
    }
  } else {
    if (Auth::setNullTime($pdo, $username)) {
      echo '<script>alert("This token is invalid !!!"); window.location.href = "./index.php";</script>';
    }
  }

?>
  <link rel="stylesheet" href="./style/login.css" media="screen">
  <section class="u-clearfix u-video u-video-cover u-section-1" id="sec-62e2">
    <div class="u-background-video u-expanded">
      <div class="embed-responsive embed-responsive-1">
        <iframe style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;" class="embed-responsive-item" src="https://www.youtube.com/embed/1VNQB0SYLII?playlist=1VNQB0SYLII&amp;loop=1&amp;mute=1&amp;showinfo=0&amp;controls=0&amp;start=0&amp;autoplay=1" data-autoplay="1" frameborder="0" allowfullscreen=""></iframe>
      </div>
    </div>
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-container-style u-custom-color-4 u-group u-preserve-proportions u-radius-15 u-shape-round u-group-1">
        <div class="u-container-layout u-container-layout-1">
          <div class=" u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" style="padding: 10px">
            <form method="post">
              <div class="u-form-email u-form-group u-label-top u-form u-form-1">
                <label for="email-3b9a" class="u-label">New Password</label>
                <input type="password" placeholder="Enter your New Password" id="email-3b9a" name="newpass" class="u-border-black u-input u-input-rectangle u-radius-10 u-text-body-color" required="">
              </div>
              <div class="u-form-group u-form-name u-label-top">
                <label for="name-3b9a" class="u-label">Confirm New Password</label>
                <input type="password" placeholder="Confirm your New Password" id="name-3b9a" name="confirmnewpass" class="u-border-black u-input u-input-rectangle u-radius-10 u-text-body-color" required="">
              </div>
              <?php if (isset($_GET['error'])) : ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
              <?php endif; ?>
              <div class="u-align-center u-form-group u-form-submit u-label-top">
                <input class="u-border-none u-btn u-btn-submit u-button-style u-grey-30 u-hover-black u-btn-1" type="submit" value="Submit" name="submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php require 'inc/footer.php';
} else {
  header('location: login.php');
} ?>