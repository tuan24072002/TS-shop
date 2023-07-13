<?php

require './inc/header.php';
require './inc/init.php';
$dataForMen = Product::getByGender($pdo, 0);
$dataForWomen = Product::getByGender($pdo, 1);
$dataFeatured1 = Product::getProductFeatured($pdo, 5);
$dataFeatured2 = Product::getProductFeatured($pdo, 10);
$dataFeatured3 = Product::getProductFeatured($pdo, 15);
$dataFeatured4 = Product::getProductFeatured($pdo, 20);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit2'])) {
  require 'send-email.php';
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $mail->AddAddress("0995086534ts@gmail.com");
  $mail->SetFrom($email, $name);
  $mail->Subject = "This is a Customer's Message";
  $content =  "<b>Name: ".$name."</b><br><b>Email: ".$email."</b><br><b>Message: ".$message."</b>";
  $mail->MsgHTML($content); 
  if($mail->Send()){
      header('location: index.php');
  }
}
?>
<link rel="stylesheet" href="./style/index.css" media="screen">





<section class="u-carousel u-slide u-block-a2e4-1" id="sildeshow" data-interval="5000" data-u-ride="carousel">
  <ol class="u-absolute-hcenter u-carousel-indicators u-block-a2e4-2">
    <li data-u-target="#sildeshow" class="u-active u-grey-30" data-u-slide-to="0"></li>
    <li data-u-target="#sildeshow" class="u-grey-30" data-u-slide-to="1"></li>
  </ol>
  <div class="u-carousel-inner" role="listbox">
    <div class="u-active u-align-center u-carousel-item u-clearfix u-image u-shading u-section-1-1" src="" data-image-width="2688" data-image-height="1400">
      <div class="u-clearfix u-sheet u-sheet-1">
        <a href="./product.php" class="u-border-2 u-border-radius-50 u-border-white u-btn u-btn-round u-button-style u-btn-1">Shop now</a>
      </div>
    </div>
    <div class="u-align-center u-carousel-item u-clearfix u-image u-shading u-section-1-2" src="" data-image-width="2688" data-image-height="1400">
      <div class="u-clearfix u-sheet u-sheet-1">
        <a href="./product.php" class="u-border-2 u-border-radius-50 u-border-white u-btn u-btn-round u-button-style u-btn-1">Shop now</a>
      </div>
    </div>
  </div>
  <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-hidden-xs u-text-grey-30 u-block-a2e4-3" href="#sildeshow" role="button" data-u-slide="prev">
    <span aria-hidden="true">
      <svg class="u-svg-link" viewBox="0 0 477.175 477.175">
        <path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                    c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path>
      </svg>
    </span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-hidden-xs u-text-grey-30 u-block-a2e4-4" href="#sildeshow" role="button" data-u-slide="next">
    <span aria-hidden="true">
      <svg class="u-svg-link" viewBox="0 0 477.175 477.175">
        <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                    c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z">
        </path>
      </svg>
    </span>
    <span class="sr-only">Next</span>
  </a>
</section>
<section class="u-align-center u-clearfix u-section-2" id="sec-12d3">
  <div class="u-clearfix u-sheet u-sheet-1">
    <h2 class="u-text u-text-default u-text-1"> Featured products</h2>
    <div class="u-expanded-width u-layout-horizontal u-list u-list-1">
      <div class="u-repeater u-repeater-1">
        <?php foreach ($dataFeatured1 as $product) : ?>
          <a href="detail.php?id=<?= $product->id ?>">
            <div class="u-align-left u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-1">
                <img class="u-expanded-width u-image u-image-default u-image-1" alt="" data-image-width="864" data-image-height="1080" src="<?= $product->image_file ?>">
                <h4 class="u-text u-text-2"><?= $product->name ?></h4>
                <p class="u-text u-text-3">$<?= $product->price ?></p>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
        <?php foreach ($dataFeatured2 as $product) : ?>
          <a href="detail.php?id=<?= $product->id ?>">
            <div class="u-align-left u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-2">
                <img class="u-expanded-width u-image u-image-default u-image-2" alt="" data-image-width="864" data-image-height="1080" src="<?= $product->image_file ?>">
                <h4 class="u-text u-text-4"><?= $product->name ?></h4>
                <p class="u-text u-text-5">$<?= $product->price ?></p>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
        <?php foreach ($dataFeatured3 as $product) : ?>
          <a href="detail.php?id=<?= $product->id ?>">
            <div class="u-align-left u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-3">
                <img class="u-expanded-width u-image u-image-default u-image-3" alt="" data-image-width="864" data-image-height="1080" src="<?= $product->image_file ?>">
                <h4 class="u-text u-text-6"><?= $product->name ?></h4>
                <p class="u-text u-text-7">$<?= $product->price ?><br>
                </p>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
        <?php foreach ($dataFeatured4 as $product) : ?>
          <a href="detail.php?id=<?= $product->id ?>">
            <div class="u-align-left u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-4">
                <img class="u-expanded-width u-image u-image-default u-image-4" alt="" data-image-width="864" data-image-height="1080" src="<?= $product->image_file ?>">
                <h4 class="u-text u-text-8"><?= $product->name ?></h4>
                <p class="u-text u-text-9">$<?= $product->price ?></p>
              </div>
            </div>
      </div></a>
    <?php endforeach; ?>
    <a class="u-absolute-vcenter u-gallery-nav u-gallery-nav-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-1" href="#" role="button">
      <span aria-hidden="true">
        <svg viewBox="0 0 451.847 451.847">
          <path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path>
        </svg>
      </span>
      <span class="sr-only">
        <svg viewBox="0 0 451.847 451.847">
          <path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path>
        </svg>
      </span>
    </a>
    <a class="u-gallery-nav u-gallery-nav-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-2" href="#" role="button">
      <span aria-hidden="true">
        <svg viewBox="0 0 451.846 451.847">
          <path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path>
        </svg>
      </span>
      <span class="sr-only">
        <svg viewBox="0 0 451.846 451.847">
          <path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path>
        </svg>
      </span>
    </a>
    </div>
  </div>
</section>

<section class="u-clearfix u-image u-section-4" id="carousel_16e5" data-image-width="1920" data-image-height="1080">
  <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
    <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
      <div class="u-layout">
        <div class="u-layout-row">
          <div class="u-container-style u-layout-cell u-opacity u-opacity-60 u-radius-50 u-shape-round u-size-60 u-white u-layout-cell-1">
            <div class="u-container-layout u-valign-top u-container-layout-1">
              <h2 class="u-align-center u-text u-text-default u-text-grey-75 u-text-1">
                <span style="font-weight: 700;">CON</span>
                <span style="font-weight: 700;">TACT US</span>
              </h2>
              <p class="u-align-center u-text u-text-default u-text-2">&nbsp;&nbsp;</p>
              <div class="u-form u-form-1">
                <form method="post" source="email" name="form-1" style="padding: 20px;">
                  <div class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form">
                    <div class="u-form-email u-form-group u-form-partition-factor-2">
                      <label for="email-7d96" class="u-label">Email</label>
                      <input type="email" placeholder="Enter your Email" id="email-7d96" name="email" class="u-border-none u-grey-5 u-input u-input-rectangle u-radius-7 u-input-1" required="">
                    </div>
                    <div class="u-form-group u-form-name u-form-partition-factor-2">
                      <label for="name-7d96" class="u-label">Name</label>
                      <input type="text" placeholder="Enter your Name" id="name-7d96" name="name" class="u-border-none u-grey-5 u-input u-input-rectangle u-radius-7 u-input-2" required="">
                    </div>
                    <div class="u-form-group u-form-message">
                      <label for="comment-7d96" class="u-label">Message</label>
                      <textarea placeholder="Enter your Message" rows="4" cols="50" id="comment-7d96" name="message" class="u-border-none u-grey-5 u-input u-input-rectangle u-radius-7 u-input-3" required=""></textarea>
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                      <a href="#" class="u-border-none u-btn u-btn-submit u-button-style u-palette-1-base u-radius-10 u-btn-1">Submit</a>
                      <input type="submit" name="submit2" value="submit" class="u-form-control-hidden">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="u-clearfix u-section-5" id="TheEssentials">
  <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-sheet-1">
    <h4 class="u-text u-text-default u-text-1"> The Essentials</h4>
    <div class="u-expanded-width u-list u-list-1">
      <div class="u-repeater u-repeater-1">
        <div class="u-container-style u-list-item u-repeater-item">
          <div class="u-container-layout u-similar-container u-container-layout-1">
            <img alt="" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="600" data-image-height="596" src="images/posterMen.jpg">
            <a href="./product.php" class="u-border-none u-btn u-btn-round u-button-style u-radius-34 u-white u-btn-1">Men's</a>
          </div>
        </div>
        <div class="u-container-style u-list-item u-repeater-item">
          <div class="u-container-layout u-similar-container u-container-layout-2">
            <img alt="" class="u-expanded-width u-image u-image-default u-image-2" data-image-width="600" data-image-height="596" src="images/posterWomen.jpg">
            <a href="./product.php" class="u-border-none u-btn u-btn-round u-button-style u-radius-34 u-white u-btn-2">Women's</a>
          </div>
        </div>
        <div class="u-container-style u-list-item u-repeater-item">
          <div class="u-container-layout u-similar-container u-container-layout-3">
            <img alt="" class="u-expanded-width u-image u-image-default u-image-3" data-image-width="600" data-image-height="596" src="images/posterKid.jpg">
            <a href="./product.php" class="u-border-none u-btn u-btn-round u-button-style u-radius-34 u-white u-btn-3">Kid's</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="u-clearfix u-image u-section-6" id="aboutus" data-image-width="900" data-image-height="506">
  <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
    <div class="u-container-style u-group u-opacity u-opacity-75 u-preserve-proportions u-shape-rectangle u-white u-group-1">
      <div class="u-container-layout u-container-layout-1">
        <h2 class="u-align-center u-text u-text-default u-text-1">ABOUT<span style="font-weight: 700;"></span> US
        </h2>
        <h4 class="u-text u-text-default u-text-2"> &nbsp; &nbsp; &nbsp; ​When it comes to Nike, it is impossible not
          to mention the iconic Nike "swoosh" logo with the arrogant slogan "Just do it" that has contributed to
          Nike's reputation and huge profits. <br>&nbsp; &nbsp; &nbsp; To date, Nike is known not only as a successful
          shoe brand, but also as a representative of American culture and style.
        </h4>
      </div>
    </div>
  </div>
</section>
<section class="u-align-center u-clearfix u-white u-section-7" id="sec-d982">
  <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
    <div id="carousel-5989" data-interval="6750" data-u-ride="carousel" class="u-carousel u-carousel-duration-0 u-expanded-width-sm u-expanded-width-xs u-slider u-slider-1">
      <ol class="u-absolute-hcenter u-carousel-indicators u-carousel-indicators-1">
        <li data-u-target="#carousel-5989" class="u-active u-grey-30 u-shape-circle" data-u-slide-to="0" style="width: 10px; height: 10px;"></li>
        <li data-u-target="#carousel-5989" class="u-grey-30 u-shape-circle" data-u-slide-to="1" style="width: 10px; height: 10px;"></li>
        <li data-u-target="#carousel-5989" class="u-grey-30 u-shape-circle" data-u-slide-to="2" style="width: 10px; height: 10px;"></li>
      </ol>
      <div class="u-carousel-inner" role="listbox">
        <div class="u-active u-align-center u-carousel-item u-container-style u-slide u-white u-carousel-item-1">
          <div class="u-container-layout u-container-layout-1">
            <div alt="" class="u-image u-image-circle u-image-1" data-image-width="960" data-image-height="960"></div>
            <h4 class="u-text u-text-default u-text-1">ThanhLong Nguyen<br>
            </h4>
            <p class="u-large-text u-text u-text-variant u-text-2">Good product, many varieties&nbsp;&nbsp;<span class="u-icon u-text-custom-color-1"><svg class="u-svg-content" viewBox="0 0 51.997 51.997" x="0px" y="0px" style="width: 1em; height: 1em;">
                  <path d="M51.911,16.242C51.152,7.888,45.239,1.827,37.839,1.827c-4.93,0-9.444,2.653-11.984,6.905
	c-2.517-4.307-6.846-6.906-11.697-6.906c-7.399,0-13.313,6.061-14.071,14.415c-0.06,0.369-0.306,2.311,0.442,5.478
	c1.078,4.568,3.568,8.723,7.199,12.013l18.115,16.439l18.426-16.438c3.631-3.291,6.121-7.445,7.199-12.014
	C52.216,18.553,51.97,16.611,51.911,16.242z"></path>
                </svg></span>
            </p>
          </div>
        </div>
        <div class="u-align-center u-carousel-item u-container-style u-slide u-carousel-item-2">
          <div class="u-container-layout u-container-layout-2">
            <div alt="" class="u-image u-image-circle u-image-2" data-image-width="953" data-image-height="960"></div>
            <h4 class="u-text u-text-default u-text-3">KimPhung Tran<br>
            </h4>
            <p class="u-large-text u-text u-text-variant u-text-4">Fast delivery&nbsp;<span class="u-file-icon u-icon"><img src="images/889221.png" alt=""></span>
            </p>
          </div>
        </div>
        <div class="u-carousel-item u-container-style u-slide u-carousel-item-3">
          <div class="u-container-layout u-container-layout-3">
            <div alt="" class="u-image u-image-circle u-image-3" data-image-width="200" data-image-height="200"></div>
            <h4 class="u-text u-text-default u-text-5">ThaiBao Nguyen<br>
            </h4>
            <p class="u-large-text u-text u-text-variant u-text-6">Good product, I will be back&nbsp;&nbsp;<span class="u-file-icon u-icon"><img src="images/10263272.png" alt=""></span>
            </p>
          </div>
        </div>
      </div>
      <a class="u-absolute-vcenter u-black u-carousel-control u-carousel-control-prev u-hidden-xs u-icon-circle u-spacing-10 u-carousel-control-1" href="#carousel-5989" role="button" data-u-slide="prev">
        <span aria-hidden="true">
          <svg viewBox="0 0 477.175 477.175">
            <path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
		c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path>
          </svg>
        </span>
        <span class="sr-only">
          <svg viewBox="0 0 477.175 477.175">
            <path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
		c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path>
          </svg>
        </span>
      </a>
      <a class="u-absolute-vcenter u-black u-carousel-control u-carousel-control-next u-hidden-xs u-icon-circle u-spacing-10 u-carousel-control-2" href="#carousel-5989" role="button" data-u-slide="next">
        <span aria-hidden="true">
          <svg viewBox="0 0 477.175 477.175">
            <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
		c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z">
            </path>
          </svg>
        </span>
        <span class="sr-only">
          <svg viewBox="0 0 477.175 477.175">
            <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
		c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z">
            </path>
          </svg>
        </span>
      </a>
    </div>
  </div>
  <style data-mode="XXL">
    @media (max-width: 0px) {
      .u-section-7 {
        background-image: none;
      }

      .u-section-7 .u-sheet-1 {
        min-height: 579px;
      }

      .u-section-7 .u-slider-1 {
        min-height: 480px;
        width: 763px;
        margin-top: 50px;
        margin-bottom: 50px;
        margin-left: auto;
        margin-right: auto;
      }

      .u-section-7 .u-carousel-indicators-1 {
        position: absolute;
        bottom: 10px;
        width: auto;
        height: auto;
      }

      .u-section-7 .u-container-layout-1 {
        padding-top: 30px;
        padding-bottom: 30px;
        padding-left: 80px;
        padding-right: 80px;
      }

      .u-section-7 .u-image-1 {
        width: 83px;
        height: 83px;
        background-image: url("data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJtYW4iIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCAyNTYgMjU2IiBzdHlsZT0id2lkdGg6IDI1NnB4OyBoZWlnaHQ6IDI1NnB4OyI+CjxyZWN0IGZpbGw9IiNDNkQ4RTEiIHdpZHRoPSIyNTYiIGhlaWdodD0iMjU2Ii8+CjxwYXRoIGZpbGw9IiM3Rjk2QTYiIGQ9Ik0xNzIuNiw5My40YzExLjYtNDQuNy0xMS4yLTQ4LjYtMTEuNy00OC4xYy0yMi40LTMxLjMtOTAuMy0xNi44LTc3LjQsNDguMWMtMTMuMy0yLjQtMS44LDMxLjYsMy43LDMyLjEKCWMwLDAsMCwwLDAsMGMwLjIsMCwwLjMsMCwwLjUtMC4xYzE0LjQsNDkuNyw2Mi43LDUwLjIsODAuNywwQzE3Mi4zLDEyNy4zLDE4Ni41LDkzLjMsMTcyLjYsOTMuNHoiLz4KPHBhdGggZmlsbD0iIzdGOTZBNiIgZD0iTTIwNS40LDE3Ny45Yy0yNC02LjEtNDMuNS0xOS44LTQzLjUtMTkuOGwtMjAuNiw2NC44bC04LTIyLjhjMTkuNy0yNy41LTMwLjMtMjcuNS0xMC42LDBsLTgsMjIuOEw5NCwxNTguMQoJYzAsMC0xOS41LDEzLjctNDMuNSwxOS44QzMyLjcsMTgyLjUsMzAsMjU2LDMwLDI1NmgxOTZDMjI2LDI1NiwyMjMuMywxODIuNSwyMDUuNCwxNzcuOXoiLz4KPC9zdmc+Cg==");
        background-position: 50% 50%;
        margin-top: 0;
        margin-bottom: 0;
        margin-left: auto;
        margin-right: auto;
      }

      .u-section-7 .u-text-2 {
        margin-top: 20px;
        margin-left: 0;
        margin-right: 0;
        margin-bottom: 0;
        font-size: 1.25rem;
      }

      .u-block-e86b-16 {
        font-weight: 700;
        margin-top: 35px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 0;
      }

      .u-block-e86b-17 {
        font-size: 1rem;
        font-weight: 400;
        margin-top: 15px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 0;
      }

      .u-section-7 .u-container-layout-2 {
        padding-top: 30px;
        padding-bottom: 30px;
        padding-left: 80px;
        padding-right: 80px;
      }

      .u-section-7 .u-image-2 {
        width: 83px;
        height: 83px;
        background-image: url("data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJtYW4iIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCAyNTYgMjU2IiBzdHlsZT0id2lkdGg6IDI1NnB4OyBoZWlnaHQ6IDI1NnB4OyI+CjxyZWN0IGZpbGw9IiNDNkQ4RTEiIHdpZHRoPSIyNTYiIGhlaWdodD0iMjU2Ii8+CjxwYXRoIGZpbGw9IiM3Rjk2QTYiIGQ9Ik0xNzIuNiw5My40YzExLjYtNDQuNy0xMS4yLTQ4LjYtMTEuNy00OC4xYy0yMi40LTMxLjMtOTAuMy0xNi44LTc3LjQsNDguMWMtMTMuMy0yLjQtMS44LDMxLjYsMy43LDMyLjEKCWMwLDAsMCwwLDAsMGMwLjIsMCwwLjMsMCwwLjUtMC4xYzE0LjQsNDkuNyw2Mi43LDUwLjIsODAuNywwQzE3Mi4zLDEyNy4zLDE4Ni41LDkzLjMsMTcyLjYsOTMuNHoiLz4KPHBhdGggZmlsbD0iIzdGOTZBNiIgZD0iTTIwNS40LDE3Ny45Yy0yNC02LjEtNDMuNS0xOS44LTQzLjUtMTkuOGwtMjAuNiw2NC44bC04LTIyLjhjMTkuNy0yNy41LTMwLjMtMjcuNS0xMC42LDBsLTgsMjIuOEw5NCwxNTguMQoJYzAsMC0xOS41LDEzLjctNDMuNSwxOS44QzMyLjcsMTgyLjUsMzAsMjU2LDMwLDI1NmgxOTZDMjI2LDI1NiwyMjMuMywxODIuNSwyMDUuNCwxNzcuOXoiLz4KPC9zdmc+Cg==");
        background-position: 50% 50%;
        margin-top: 0;
        margin-bottom: 0;
        margin-left: auto;
        margin-right: auto;
      }

      .u-section-7 .u-text-4 {
        margin-top: 20px;
        margin-left: 0;
        margin-right: 0;
        margin-bottom: 0;
        font-size: 1.25rem;
      }

      .u-section-7 .u-text-3 {
        font-weight: 700;
        margin-top: 35px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 0;
      }

      .u-block-e86b-24 {
        font-size: 1rem;
        font-weight: 400;
        margin-top: 15px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 0;
      }

      .u-section-7 .u-carousel-control-1 {
        width: 43px;
        height: 43px;
        background-image: none;
      }

      .u-section-7 .u-carousel-control-2 {
        width: 43px;
        height: 43px;
        background-image: none;
        left: auto;
        position: absolute;
        right: 0;
      }
    }
  </style>
</section>






<span style="height: 64px; width: 64px; margin-left: 0px; margin-right: auto; margin-top: 0px; background-image: none; right: 20px; bottom: 20px; padding: 15px; display: block;" class="u-back-to-top u-file-icon u-hidden-xs u-icon u-icon-circle u-opacity u-opacity-85 u-text-black u-white" data-href="#"><img src="images/d86f17fd.png" alt=""></span>
<style>
  .u-dialog-section-10 {
    background-image: none;
  }

  .u-dialog-section-10 .u-dialog-1 {
    width: 800px;
    min-height: 460px;
    height: auto;
    box-shadow: 0px 0px 8px 0px rgba(128, 128, 128, 1);
    margin: 60px auto;
  }

  .u-dialog-section-10 .u-container-layout-1 {
    padding: 0 4px;
  }

  .u-dialog-section-10 .u-image-1 {
    width: 375px;
    height: 450px;
    margin: 5px auto 0 0;
  }

  .u-dialog-section-10 .u-group-1 {
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

  .u-dialog-section-10 .u-container-layout-2 {
    padding: 15px 14px;
  }

  .u-dialog-section-10 .u-text-1 {
    font-weight: 700;
    margin: 0 26px;
  }

  .u-dialog-section-10 .u-form-1 {
    height: 230px;
    width: 320px;
    margin: 0 auto;
  }

  .u-dialog-section-10 .u-form-group-1 {
    width: 100%;
  }

  .u-dialog-section-10 .u-form-group-2 {
    width: 100%;
  }

  .u-dialog-section-10 .u-form-group-3 {
    width: 100%;
  }

  .u-dialog-section-10 .u-btn-1 {
    background-image: none;
    border-style: none;
    text-transform: uppercase;
    font-weight: 700;
    padding-left: 50px;
    padding-right: 50px;
    letter-spacing: 2px;
  }

  .u-dialog-section-10 .u-icon-1 {
    width: 24px;
    height: 24px;
    left: auto;
    top: 14px;
    position: absolute;
    right: 14px;
  }

  @media (max-width: 1199px) {
    .u-dialog-section-10 .u-image-1 {
      width: 375px;
      height: 450px;
      margin-left: 0;
    }

    .u-dialog-section-10 .u-group-1 {
      width: 364px;
      margin-top: -425px;
      margin-right: 31px;
      height: auto;
    }

    .u-dialog-section-10 .u-text-1 {
      margin-left: 26px;
      margin-right: 26px;
    }

    .u-dialog-section-10 .u-form-1 {
      width: 320px;
    }
  }

  @media (max-width: 991px) {
    .u-dialog-section-10 .u-dialog-1 {
      width: 720px;
    }

    .u-dialog-section-10 .u-container-layout-2 {
      padding-right: 0;
    }
  }

  @media (max-width: 767px) {
    .u-dialog-section-10 .u-dialog-1 {
      width: 540px;
    }

    .u-dialog-section-10 .u-container-layout-2 {
      padding-right: 0;
      padding-left: 20px;
    }
  }

  @media (max-width: 575px) {
    .u-dialog-section-10 .u-dialog-1 {
      width: 340px;
      min-height: 686px;
      margin-top: 246px;
    }

    .u-dialog-section-10 .u-container-layout-1 {
      padding-top: 40px;
      padding-left: 25px;
      padding-right: 25px;
    }

    .u-dialog-section-10 .u-image-1 {
      width: 331px;
      height: 397px;
    }

    .u-dialog-section-10 .u-group-1 {
      width: 331px;
      margin-top: -372px;
      margin-right: 0;
    }

    .u-dialog-section-10 .u-container-layout-2 {
      padding-left: 10px;
    }

    .u-dialog-section-10 .u-text-1 {
      margin-left: 10px;
      margin-right: 10px;
    }

    .u-dialog-section-10 .u-form-1 {
      width: 311px;
    }
  }
</style>
<?php require 'inc/footer.php'; ?>