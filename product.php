<?php
require 'inc/header-orther.php';
require './inc/init.php';
$data = Product::getAll($pdo);
$gender="";

if(isset($_GET['gender'])){
    $gender=$_GET['gender'];
    if($gender==0){
        $bygender=Product::getByGender($pdo,0);
    }elseif($gender==1){
        $bygender=Product::getByGender($pdo,1);
    } 
}elseif(isset($_GET['sort'])){
    $sort=$_GET['sort'];
    if($sort=='ASC'){
        $sortPrice=Product::sortASC($pdo);
    }elseif($sort=='DESC'){
        $sortPrice=Product::sortDESC($pdo);
    }
}

$page = 0;
$product_per_page = 8;
$totalProduct = Product::countProduct($pdo)['totalProduct'];
$totalPages = ceil($totalProduct / $product_per_page);

$page = $_GET['page'] ?? 1;
$limit = $product_per_page;
$offset = 0;
$offset = ($page - 1) * $product_per_page;
if ($offset < 0) {
    $offset = 0;
}
$data = Product::getProductPerPage($pdo, $limit, $offset);

if ($page > $totalPages) {
    header('location: ./product.php?page=' . $totalPages);
    exit;
} else if (intval($page) <= 0) {
    header('location: ./product.php');
    exit;
}
?>
<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .pagination a.active {
        background-color: #4CAF50;
        color: white;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }

    .sidebar {
        margin-top: 3%;
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 60px;
        transition: 0.5s;
    }

    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidebar a:hover {
        color: black;
    }

    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    .openbtn {
        position: absolute;
        margin-top: 30px;
        margin-left: 30px;
        font-size: 25pt;
        cursor: pointer;
        background-color: #111;
        color: white;
        padding: 10px 15px;
        border: none;
    }

    .openbtn:hover {
        background-color: #444;
    }

    #main {
        transition: margin-left .5s;
    }

    @media screen and (max-height: 450px) {
        .sidebar {
            padding-top: 15px;
        }

        .sidebar a {
            font-size: 18px;
        }
    }
    .list-container ul {
            list-style-type: none;
            margin-right: 20%;
        }

        .list-container li {
            padding: 10px;
            
            background-color: #f2f2f2;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        .list-container li:hover {
            background-color: #e6e6e6;
        }

        .list-container {
            width: 300px;
            margin: 0 auto;
        }

        .list-title {
            font-size: 20pt;
            font-weight: bold;
            margin-bottom: 10px;
            color: #ddd;
            margin-left: 10px;
        }
        .list-container li a{
            text-decoration: none;
            font-size: 14pt;
            font-weight: bold;
            color: black;
        }
        .list-container li a:hover{
            color: red;
        }
</style>
<script class="u-script" type="text/javascript" src="script/sidebar.js" defer=""></script>
<link rel="stylesheet" href="./style/product.css" media="screen">
<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="list-container">
        <h3 class="list-title">Nike</h3>
        <ul>
            <li><a href="./product.php?gender=0"><i class="fa-solid fa-mars fa-bounce"></i>&nbsp;&nbsp;&nbsp;For Men</a></li>
            <li><a href="./product.php?gender=1"><i class="fa-solid fa-venus fa-bounce"></i>&nbsp;&nbsp;&nbsp;For Women</a></li>
        </ul>
        <h3 class="list-title">Sort by price</h3>
        <ul>
            <li><a href="./product.php?sort=ASC"><i class="fa-solid fa-arrow-up fa-bounce"></i>&nbsp;&nbsp;&nbsp;Low To High</a></li>
            <li><a href="./product.php?sort=DESC"><i class="fa-solid fa-arrow-down fa-bounce"></i>&nbsp;&nbsp;&nbsp;High To Low</a></li>
        </ul>
    </div>

</div>

<div id="main">
    <section class="u-clearfix u-gradient u-section-2" id="sec-9de5" style="background-image:url('./images/background_product.jpg'); ">
    <button class="openbtn" onclick="openNav()"><i class="fas fa-bars"></i></button>
    <?php if(!isset($_GET['gender'])&&!isset($_GET['sort'])):?>    
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="u-expanded-width-lg u-expanded-width-md u-expanded-width-xl u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    <?php foreach ($data as $product) : ?>
                        <div style=" cursor:pointer;" class="u-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle" onclick="location.href='detail.php?id=<?= $product->id; ?>';">
                            <div class="u-container-layout u-similar-container u-valign-top-lg u-valign-top-xl u-container-layout-2">
                                <div class="u-align-left u-container-style u-group u-radius-10 u-shape-rectangle u-white u-group-2">
                                    <?php if ($product->quantity == 0) : ?><img style="width:40%;position:absolute;z-index: 1;right:50%;left:0;top:1%;" src="./images/sold.png"><?php endif; ?>
                                    <div class="u-container-layout u-container-layout-3">
                                        <img class="u-border-2 u-border-white u-image u-image-round u-preserve-proportions u-radius-17 u-image-1" src="<?= $product->image_file; ?>" alt="" data-image-width="219" data-image-height="219">
                                        <h4 class="u-text u-text-2 u-custom-font u-font-spy-agency"><?= $product->name; ?></h4>
                                        <h5 class="u-text u-text-3 u-custom-font u-font-spy-agency">Quantity: <?= $product->quantity; ?></h5>
                                        <br />
                                        <p class="u-custom-font u-font-spy-agency u-text u-text-4">$<?= $product->price; ?></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div style="text-align:center" ;>
            <div class="pagination">
                <a href="product.php?page=<?= $page - 1 ?>">
                    < </a>
                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                            <a href="product.php?page=<?= $i; ?>" <?= ($i == $page) ? 'class="active"' : ''; ?>><?= $i; ?></a>
                        <?php endfor; ?>
                        <a href="product.php?page=<?= $page + 1 ?>">></a>
            </div>
        </div>
        <?php elseif(isset($_GET['sort']) && !isset($_GET['gender'])):?>
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="u-expanded-width-lg u-expanded-width-md u-expanded-width-xl u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    <?php foreach ($sortPrice as $product) : ?>
                        <div style=" cursor:pointer;" class="u-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle" onclick="location.href='detail.php?id=<?= $product->id; ?>';">
                            <div class="u-container-layout u-similar-container u-valign-top-lg u-valign-top-xl u-container-layout-2">
                                <div class="u-align-left u-container-style u-group u-radius-10 u-shape-rectangle u-white u-group-2">
                                    <?php if ($product->quantity == 0) : ?><img style="width:40%;position:absolute;z-index: 1;right:50%;left:0;top:1%;" src="./images/sold.png"><?php endif; ?>
                                    <div class="u-container-layout u-container-layout-3">
                                        <img class="u-border-2 u-border-white u-image u-image-round u-preserve-proportions u-radius-17 u-image-1" src="<?= $product->image_file; ?>" alt="" data-image-width="219" data-image-height="219">
                                        <h4 class="u-text u-text-2 u-custom-font u-font-spy-agency"><?= $product->name; ?></h4>
                                        <h5 class="u-text u-text-3 u-custom-font u-font-spy-agency">Quantity: <?= $product->quantity; ?></h5>
                                        <br />
                                        <p class="u-custom-font u-font-spy-agency u-text u-text-4">$<?= $product->price; ?></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php else:?>  
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="u-expanded-width-lg u-expanded-width-md u-expanded-width-xl u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    <?php foreach ($bygender as $product) : ?>
                        <div style=" cursor:pointer;" class="u-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle" onclick="location.href='detail.php?id=<?= $product->id; ?>';">
                            <div class="u-container-layout u-similar-container u-valign-top-lg u-valign-top-xl u-container-layout-2">
                                <div class="u-align-left u-container-style u-group u-radius-10 u-shape-rectangle u-white u-group-2">
                                    <?php if ($product->quantity == 0) : ?><img style="width:40%;position:absolute;z-index: 1;right:50%;left:0;top:1%;" src="./images/sold.png"><?php endif; ?>
                                    <div class="u-container-layout u-container-layout-3">
                                        <img class="u-border-2 u-border-white u-image u-image-round u-preserve-proportions u-radius-17 u-image-1" src="<?= $product->image_file; ?>" alt="" data-image-width="219" data-image-height="219">
                                        <h4 class="u-text u-text-2 u-custom-font u-font-spy-agency"><?= $product->name; ?></h4>
                                        <h5 class="u-text u-text-3 u-custom-font u-font-spy-agency">Quantity: <?= $product->quantity; ?></h5>
                                        <br />
                                        <p class="u-custom-font u-font-spy-agency u-text u-text-4">$<?= $product->price; ?></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif;?>
    </section>
</div>

<script>
    function openNav() {
        var sidebar = document.getElementById("mySidebar");
        var openbtn = document.querySelector(".openbtn");

        sidebar.style.width = "250px";
        openbtn.classList.add("hide");
    }

    function closeNav() {
        var sidebar = document.getElementById("mySidebar");
        var openbtn = document.querySelector(".openbtn");

        sidebar.style.width = "0";
        openbtn.classList.remove("hide");
    }
</script>





<?php require 'inc/footer.php'; ?>