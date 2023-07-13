<?php
require 'inc/header-orther.php';
require './inc/init.php';

$token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
    $email = $_POST['email'];
    if (Auth::checkEmailVerified($pdo, $email)) {
        if (Auth::createTokenForgotPassword($pdo, $token, $email)) {
            $stm=$pdo->prepare("SELECT * FROM account WHERE email='$email'");
            $stm->execute();
            $row=$stm->fetch(PDO::FETCH_ASSOC);
            require 'send-email.php';
            $mail->AddAddress($email);
            $mail->SetFrom("0995086534ts@gmail.com");
            $mail->Subject = "Reset Password";
            $content = "<b>Gmail: </b>$email<br><b>Password reset link: </b>https://nikeshoesstore.online/reset-password.php?username={$row['username']}&token={$token}<br><a style="."color:red;"."><b>The password reset link is only valid for 60 minutes</b></a>";
            $mail->MsgHTML($content); 
            if($mail->Send()){
                header('location: login.php');
            }
        } else {
            echo 'Failed 2';
        }
    } else {
        header('location: forgot-password.php?error=Email does not exist !!!');
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
              <label for="email-3b9a" class="u-label">Email</label>
              <input type="email" placeholder="Enter your Email" id="email-3b9a" name="email" class="u-border-black u-input u-input-rectangle u-radius-10 u-text-body-color" required="">
            </div>
            <?php if (isset($_GET['error'])) : ?>
              <p class="error"><?php echo $_GET['error']; ?></p>
            <?php endif; ?>
            <div class="u-align-center u-form-group u-form-submit u-label-top">
              <input class="u-border-none u-btn u-btn-submit u-button-style u-grey-30 u-hover-black u-btn-1" type="submit" value="Send" name="submit">
            </div>
          </form>
        </div>
        <a href="login.php">
              <h6 class="u-text u-text-default u-text-1">Already Have An Account?</h6>
            </a>

      </div>
    </div>

  </div>
</section>
<?php require 'inc/footer.php'; ?>