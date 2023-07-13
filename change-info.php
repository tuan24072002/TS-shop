<?php
require 'inc/header-orther.php';
if (isset($_SESSION['login'])) {
    require './inc/init.php';
    $username = $_SESSION['login'];
    $change = Auth::getUserByUsername($pdo, $username);
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $phonenumber=$_POST['phonenumber'];
        if(Auth::updateInfo($pdo,$name,$email,$phonenumber,$username)){
            echo '<script>alert("Successfully updated !!!"); window.location.href = "./change-info.php";</script>';
        }
    }
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <link rel="stylesheet" href="./style/change-info.css">
    <section class="u-align-center u-clearfix u-image u-section-1" id="sec-6bbb" data-image-width="1920" data-image-height="1080">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="u-form u-form-1">
                <form method="post" style="padding: 10px;" source="email" name="form">
                    <div class="u-clearfix u-form-spacing-20 u-form-vertical u-inner-form">
                        <div class="u-form-group u-form-name u-label-top">
                            <label for="name-3b9a" class="u-label u-text-white u-label-1">Name</label>
                            <input type="text" placeholder="Enter your Name" value="<?= $change->name ?>" id="name-3b9a" name="name" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-radius-10 u-text-grey-75 u-input-1" required="">
                        </div>
                        <div class="u-form-email u-form-group u-label-top">
                            <label for="message-3b9a" class="u-label u-text-white u-label-2">Email</label>
                            <input placeholder="Enter your email" value="<?= $change->email ?>" rows="4" cols="50" id="message-3b9a" name="email" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-radius-10 u-text-grey-75 u-input-2" required="required" type="email">
                        </div>
                        <div class="u-form-group u-label-top u-form-group-3">
                            <label for="text-769c" class="u-label u-text-white u-label-3">Address</label>
                            <input type="text" value="<?= $change->address ?>" placeholder="Enter your Address" id="text-769c" name="address" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-radius-10 u-text-grey-75 u-input-3">
                        </div>
                        <div class="u-form-group u-form-phone u-label-top">
                            <div class="phone-input">
                                <label for="phone-number" class="u-label u-text-white u-label-4">Phone number</label><br>
                                <input type="tel" value="<?= $change->phonenumber ?>" placeholder="Enter your Phone number" id="phone-number" name="phonenumber" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-radius-10 u-text-grey-75 u-input-4" required="required">
                            </div>

                        </div>
                    </div>
                    <div class="u-align-center u-form-group u-form-submit u-label-top">
                        <a href="#" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-hover-grey-30 u-radius-10 u-white u-btn-1">Submit</a>
                        <input type="submit" name="submit" value="submit" class="u-form-control-hidden">
                    </div>
            </div>
            </form>
        </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.js"></script>
    <script>
        var input = document.querySelector("#phone-number");
        var iti = window.intlTelInput(input, {
            initialCountry: "vn",
            preferredCountries: ["us", "gb", "au"] // Các quốc gia ưu tiên hiển thị đầu tiên
        });
    </script>
    <style>
        .phone-input {
            align-items: center;
        }

        .phone-input .iti {
            margin-right: 5px;
        }

        .phone-input input[type="tel"] {
            width: 550px;
        }
    </style>
<?php require 'inc/footer.php';
} else {
    header('location: ./index.php');
} ?>