<?php
require 'inc/header-admin.php';
if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    require "./inc/init.php";
    if (empty($_GET['id'])) {
        header('location: ./index-admin.php');
    }
    $id = $_GET['id'];
    $edit = Product::getOneByID($pdo, $id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $gender = $_POST['gender'];
        $quantity = $_POST['quantity'];
        try {
            if (empty($_FILES['image'])) {
                throw new Exception('Invalid upload');
            }
            switch ($_FILES['image']['error']) {
                case  UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new Exception('No file upload');
                    break;
                default:
                    throw new Exception('An error occured');
            }

            if ($_FILES['image']['size'] > 1000000) {
                throw new Exception('Image too large ');
            }
            $mime_types = ['image/gif', 'image/jpeg', 'image/png'];
            $file_info = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($file_info, $_FILES['image']['tmp_name']);
            if (!in_array($mime_type, $mime_types)) {
                throw new Exception('Invalid file type');
                exit;
            } else {
                unlink('../' . $edit->image_file);
            }

            $pathinfo = pathinfo($_FILES['image']['name']);
            //$fname=$pathinfo['filename'];
            $fname = 'image';
            $extension = $pathinfo['extension'];
            if ($gender == 0) {
                $dest = '../images/formen/' . $fname . '.' . $extension;
                $i = 1;
                while (file_exists($dest)) {
                    $dest = '../images/formen/' . $fname . "-$i" . '.' . $extension;
                    $i++;
                }
            } else if ($gender == 1) {
                $dest = '../images/forwomen/' . $fname . '.' . $extension;
                $i = 1;
                while (file_exists($dest)) {
                    $dest = '../images/forwomen/' . $fname . "-$i" . '.' . $extension;
                    $i++;
                }
            }
            //write file
            if (move_uploaded_file($_FILES['image']['tmp_name'], $dest)) {
                $update = new Product();
                $update->name = $name;
                $update->description = $desc;
                $update->price = $price;
                $update->gender = $gender;
                $update->image_file = substr($dest, 3);
                $update->quantity = $quantity;
                if ($update->edit($pdo, $id)) {
                    header("location: index-admin.php");
                }
            } else {
                throw new Exception('Unable to move file');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit2'])) {
        header("location: ./delete-imagefile.php?id=$id");
    }
?>
    <style>
        .file-input-wrapper {
            position: relative;
            display: inline-block;
        }

        .file-input-value {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            padding: 0.375rem 0.75rem;
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            pointer-events: none;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .file-input-label {
            position: relative;
            display: inline-block;
            padding: 0.375rem 0.90rem;
            margin-left: -1px;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            cursor: pointer;
            margin-top: 4%;
        }

        .file-input-label:hover {
            background-color: #dee2e6;
        }
    </style>
    <link rel="stylesheet" href="./style/new-product.css">
    <section class="u-clearfix u-image u-section-1" id="sec-1d1c" data-image-width="1920" data-image-height="1080">
        <div class="u-clearfix u-sheet u-sheet-1">
            <h2 class="u-align-justify u-text u-text-custom-color-1 u-text-default u-text-1">Edit Product<span style="font-weight: 700;"></span>
            </h2>
            <div class="u-container-style u-group u-opacity u-opacity-60 u-palette-5-base u-radius-20 u-shape-round u-group-1">
                <div class="u-container-layout u-container-layout-1">
                    <div class="u-expanded-width ">
                        <form method="post" enctype="multipart/form-data" class="" source="email" name="form" style="padding: 4px;">
                            <div class="u-form-group u-form-name u-label-left">
                                <label for="name-8923" class="u-label u-spacing-0 u-text-custom-color-3 u-label-1">Name</label>
                                <input type="text" id="name-8923" name="name" value="<?= $edit->name ?>" class="u-input u-input-rectangle u-palette-5-light-1 u-radius-10" required="" autofocus="autofocus">
                            </div>
                            <div class="u-form-group u-form-message u-label-left">
                                <label for="message-8923" class="u-label u-spacing-0 u-text-custom-color-3 u-label-2">Description</label>
                                <textarea rows="4" cols="50" id="message-8923" name="desc" class="u-input u-input-rectangle u-palette-5-light-1 u-radius-10"><?= $edit->description ?></textarea>
                            </div>
                            <div class="u-form-group u-label-left u-form-group-3">
                                <label for="text-94ae" class="u-label u-spacing-0 u-text-custom-color-3 u-label-3">Price</label>
                                <input type="text" id="text-94ae" value="<?= $edit->price ?>" name="price" class="u-input u-input-rectangle u-palette-5-light-1 u-radius-10">
                            </div>
                            <div class="u-form-group u-form-select u-label-left u-form-group-4">
                                <label for="select-efa0" class="u-label u-spacing-0 u-text-custom-color-3 u-label-4">Gender</label>
                                <div class="u-form-select-wrapper">
                                    <?php if ($edit->gender == 0) : ?>
                                        <select id="select-efa0" name="gender" class="u-input u-input-rectangle u-palette-5-light-1 u-radius-10">
                                            <option value="0" data-calc="0" selected>Men</option>
                                            <option value="1" data-calc="1">Women</option>
                                        </select>
                                    <?php else : ?>
                                        <select id="select-efa0" name="gender" class="u-input u-input-rectangle u-palette-5-light-1 u-radius-10">
                                            <option value="0" data-calc="0">Men</option>
                                            <option value="1" data-calc="1" selected>Women</option>
                                        </select>
                                    <?php endif; ?>

                                    <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve">
                                        <polygon class="st0" points="8,12 2,4 14,4 "></polygon>
                                    </svg>
                                </div>
                            </div>
                            <div class="u-form-group u-form-name u-label-left">
                                <label for="name-8923" class="u-label u-spacing-0 u-text-custom-color-3 u-label-1">Quantity</label>
                                <input type="number" id="name-8923" name="quantity" value="<?= $edit->quantity ?>" class="u-input u-input-rectangle u-palette-5-light-1 u-radius-10" required="" autofocus="autofocus">
                            </div>
                            <div class="u-form-group u-label-left u-form-group-5">
                                <label for="text-350b" class="u-label u-spacing-0 u-text-custom-color-3 u-label-5">Image</label>
                                <div class="file-input-wrapper">
                                    <input type="file" id="text-350b" name="image" class="u-input u-input-rectangle u-palette-5-light-1 u-radius-10" accept="image/*">
                                    <span class="file-input-value"><img src="../<?= $edit->image_file ?>" width="50" height="50px" alt=""></span>
                                    <label for="text-350b" class="file-input-label">Choose File</label>
                                </div>

                            </div>

                            <div class="u-form-group u-form-submit u-label-left">
                                <label class="u-label u-spacing-0 u-text-custom-color-3 u-label-6"></label>
                                <div class="u-align-center u-btn-submit-container">

                                            <input type="submit" value="submit" name="submit" class="u-form-control u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-1 u-hover-black u-radius-10 u-text-white u-btn-1">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php require 'inc/footer-admin.php';
} else {
    header('location: ../index.php');
} ?>