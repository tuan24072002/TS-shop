<?php
require 'inc/header-orther.php';
require './inc/init.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $getPass = Auth::getPassword($pdo, $username);


    if (password_verify($password, $getPass)) {
      $role = Auth::checkRole($pdo, $username, $password);
      if ($role == 1) {
        $_SESSION['login'] = 'admin';
        header('location: ./admin/index-admin.php');
        exit;
      } else {
        if (!Auth::checkBlackList($pdo, $username)) {
          $_SESSION['login'] = $username;
          header('location: index.php');
          exit;
        } else {
          header('location: login.php?error=Your account has been banned !!!');
          exit;
        }
      }
    } else {
      header('location: login.php?error=Incorrect Username Or Password !!!');
      exit;
    }
  }
}

?>
<style>
  .error {
    margin-left: 5%;
    background: #F2DEDE;
    color: #A94442;
    padding: 10px;
    width: 100%;
    border-radius: 5px;
  }
</style>
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
              <label for="email-3b9a" class="u-label">Username</label>
              <input type="text" placeholder="Enter your Username" id="email-3b9a" name="username" class="u-border-black u-input u-input-rectangle u-radius-10 u-text-body-color" required="">
            </div>
            <div class="u-form-group u-form-name u-label-top">
              <label for="name-3b9a" class="u-label">Password</label>
              <input type="password" placeholder="Enter your Password" id="name-3b9a" name="password" class="u-border-black u-input u-input-rectangle u-radius-10 u-text-body-color" required="">
            </div>
            <?php if (isset($_GET['error'])) : ?>
              <p class="error"><?php echo $_GET['error']; ?></p>
            <?php endif; ?>
            <div class="u-align-center u-form-group u-form-submit u-label-top">
              <input class="u-border-none u-btn u-btn-submit u-button-style u-grey-30 u-hover-black u-btn-1" type="submit" value="Sign in" name="submit">
            </div>
          </form>
        </div>
        <a href="forgot-password.php">
          <h6 class="u-text u-text-default u-text-1">Forgot Password?</h6>
        </a>
        <a href="register.php">
          <h6 class="u-text u-text-default u-text-1">Create A New Account?</h6>
        </a>

      </div>
    </div>
    <h1 class="u-text u-text-body-alt-color u-text-default u-text-2">LOGIN<br>
    </h1>
  </div>
</section>
<?php require 'inc/footer.php' ?>