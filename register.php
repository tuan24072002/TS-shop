<?php
require 'inc/header-orther.php';
require './inc/init.php';
$passError = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $name = $_POST['name'];
    if ($confirmpassword != $password) {
        $passError = "You must confirm the correct password !!!";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $register = new Auth();
        $register->username = $username;
        $register->password = $hash;

        $register->name = $name;
        $register->address = $address;
        $register->phonenumber = $phonenumber;
        $register->email = $email;
        if ($register->register($pdo)) {
            header('location: ./login.php');
        }
    }
}
?>
<link rel="stylesheet" href="./style/register.css" media="screen">

<meta http-equiv="">

<section class="u-clearfix u-video u-video-cover u-section-1" id="sec-62e2">
    <div class="u-background-video u-expanded">
        <div class="embed-responsive embed-responsive-1">
            <iframe style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;" class="embed-responsive-item" src="https://www.youtube.com/embed/1VNQB0SYLII?playlist=1VNQB0SYLII&amp;loop=1&amp;mute=1&amp;showinfo=0&amp;controls=0&amp;start=0&amp;autoplay=1" data-autoplay="1" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div class="u-clearfix u-sheet u-sheet-1 ">
        <div class="u-container-style u-custom-color-4 u-group u-preserve-proportions u-radius-15 u-shape-round u-group-1 ">
            <div class="u-container-layout u-container-layout-1">
                <div class="u-carousel u-carousel-duration-250 u-carousel-fade " data-interval="0" data-u-ride="false">
                    <form class="u-clearfix u-form-spacing-10 u-inner-form" method="post" style="padding: 10px" source="email" name="form">
                        <div class="u-carousel-inner u-form-vertical  u-form u-form-1" role="listbox">
                            <div class="u-active u-carousel-item u-form-step u-slide">
                                <div class="u-form-email u-form-group u-label-top">
                                    <label for="email-3b9a" class="u-label">Username (*)</label>
                                    <input type="text" placeholder="Enter your Username" id="email-3b9a" name="username" class="u-border-black u-input u-input-rectangle u-radius-10 u-text-body-color" required="">
                                </div>
                                <div class="u-form-group u-form-name u-label-top">
                                    <label for="name-3b9a" class="u-label">Password (*)</label>
                                    <input type="password" placeholder="Enter your Password" id="name-3b9a" name="password" class="u-border-black u-input u-input-rectangle u-radius-10 u-text-body-color" required="">
                                </div>
                                <div class="u-form-group u-label-top u-form-group-3">
                                    <label for="text-0433" class="u-label">Comfirm Password (*)</label>
                                    <input type="password" placeholder="Enter your Confirm Password" id="text-0433" name="confirmpassword" class="u-border-black u-input u-input-rectangle u-radius-10 u-text-body-color" required="required">
                                </div>
                            </div>
                            <div class="u-carousel-item u-form-step u-slide">
                                <div class="u-form-group u-label-top u-form-group-4">
                                    <label for="text-e57d" class="u-label">Name (*)</label>
                                    <input type="text" placeholder="Enter your Name" id="text-e57d" name="name" class="u-border-black u-input u-input-rectangle u-radius-10 u-text-body-color" required>
                                </div>
                                <div class="u-form-group u-label-top u-form-group-5">
                                    <label for="text-130e" class="u-label">Phone Number</label>
                                    <input type="number" id="text-130e" name="phonenumber" class="u-border-black u-input u-input-rectangle u-radius-10 u-text-body-color" placeholder="Enter your Phone Number">
                                </div>
                                <div class="u-form-group u-label-top u-form-group-6">
                                    <label for="text-0c8b" class="u-label">Email (*)</label>
                                    <input type="email" placeholder="Enter your Email" id="text-0c8b" name="email" class="u-border-black u-input u-input-rectangle u-radius-10 u-text-body-color" required>
                                </div>
                                <div class="u-form-group u-label-top u-form-group-7">
                                    <label for="text-d942" class="u-label">Address</label>
                                    <input type="text" placeholder="Enter your Address" id="text-d942" name="address" class="u-border-black u-input u-input-rectangle u-radius-10 u-text-body-color">
                                </div>
                            </div>
                        </div>
                        <div class="u-align-center u-form-group u-form-submit u-label-top">
                            <a href="#" class="u-border-none u-btn u-btn-step u-btn-step-prev u-button-style u-grey-30 u-hover-black u-btn-1">Back</a>
                            <a href="#" class="u-border-none u-btn u-btn-step u-btn-step-next u-button-style u-grey-30 u-hover-black u-btn-1">Next</a>
                            <input type="submit" value="Register" name="submit" class="u-form-control u-border-none u-btn u-btn-submit u-button-style u-grey-30 u-hover-black u-btn-1">
                        </div>

                        <input type="hidden" value="" name="recaptchaResponse">
                        <input type="hidden" name="formServices" value="fb78578b43e63833bff47c038abc09ec">
                    </form>
                </div>
                <h6 class="u-text u-text-default u-text-1">
                    <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-4" href="login.php">Already Have An Account?</a>
                </h6>
                <p style="color: red; font-weight: bold;"><?= $passError ?></p>
            </div>
        </div>
        <h1 class="u-text u-text-body-alt-color u-text-default u-text-2">Register<br>
        </h1>
    </div>
</section>
<style>
    .u-dialog-section-4 {
        background-image: none;
    }

    .u-dialog-section-4 .u-dialog-1 {
        width: 800px;
        min-height: 460px;
        height: auto;
        box-shadow: 0px 0px 8px 0px rgba(128, 128, 128, 1);
        margin: 60px auto;
    }

    .u-dialog-section-4 .u-container-layout-1 {
        padding: 0 4px;
    }

    .u-dialog-section-4 .u-image-1 {
        width: 375px;
        height: 450px;
        margin: 5px auto 0 0;
    }

    .u-dialog-section-4 .u-group-1 {
        width: 364px;
        min-height: 400px;
        height: auto;
        --animation-custom_in-translate_x: 0px;
        --animation-custom_in-translate_y: 0px;
        --animation-custom_in-opacity: 0;
        --animation-custom_in-rotate: 0deg;
        --animation-custom_in-scale: 0.3;
        margin: -425px 31px 0 auto;
    }

    .u-dialog-section-4 .u-container-layout-2 {
        padding: 15px 14px;
    }

    .u-dialog-section-4 .u-text-1 {
        font-weight: 700;
        margin: 0 26px;
    }

    .u-dialog-section-4 .u-form-1 {
        height: 230px;
        width: 320px;
        margin: 0 auto;
    }

    .u-dialog-section-4 .u-form-group-1 {
        width: 100%;
    }

    .u-dialog-section-4 .u-form-group-2 {
        width: 100%;
    }

    .u-dialog-section-4 .u-form-group-3 {
        width: 100%;
    }

    .u-dialog-section-4 .u-btn-1 {
        background-image: none;
        border-style: none;
        text-transform: uppercase;
        font-weight: 700;
        padding-left: 50px;
        padding-right: 50px;
        letter-spacing: 2px;
    }

    .u-dialog-section-4 .u-icon-1 {
        width: 24px;
        height: 24px;
        left: auto;
        top: 14px;
        position: absolute;
        right: 14px;
    }

    @media (max-width: 1199px) {
        .u-dialog-section-4 .u-image-1 {
            width: 375px;
            height: 450px;
            margin-left: 0;
        }

        .u-dialog-section-4 .u-group-1 {
            width: 364px;
            margin-top: -425px;
            margin-right: 31px;
            height: auto;
        }

        .u-dialog-section-4 .u-text-1 {
            margin-left: 26px;
            margin-right: 26px;
        }

        .u-dialog-section-4 .u-form-1 {
            width: 320px;
        }
    }

    @media (max-width: 991px) {
        .u-dialog-section-4 .u-dialog-1 {
            width: 720px;
        }

        .u-dialog-section-4 .u-container-layout-2 {
            padding-right: 0;
        }
    }

    @media (max-width: 767px) {
        .u-dialog-section-4 .u-dialog-1 {
            width: 540px;
        }

        .u-dialog-section-4 .u-container-layout-2 {
            padding-right: 0;
            padding-left: 20px;
        }
    }

    @media (max-width: 575px) {
        .u-dialog-section-4 .u-dialog-1 {
            width: 340px;
            min-height: 686px;
            margin-top: 246px;
        }

        .u-dialog-section-4 .u-container-layout-1 {
            padding-top: 40px;
            padding-left: 25px;
            padding-right: 25px;
        }

        .u-dialog-section-4 .u-image-1 {
            width: 331px;
            height: 397px;
        }

        .u-dialog-section-4 .u-group-1 {
            width: 331px;
            margin-top: -372px;
            margin-right: 0;
        }

        .u-dialog-section-4 .u-container-layout-2 {
            padding-left: 10px;
        }

        .u-dialog-section-4 .u-text-1 {
            margin-left: 10px;
            margin-right: 10px;
        }

        .u-dialog-section-4 .u-form-1 {
            width: 311px;
        }
    }
</style>
<?php require 'inc/footer.php' ?>