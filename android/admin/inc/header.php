<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <title>Document</title>
  <style>
    .product {
      float: left;
      width: 100%;
      height: auto;
      margin-top: 2%;
    }

    h1 {
      font-weight: bold;
      color: red;
      margin: 10px 3%;
    }

    .nav-item .nav-link {
      font-size: 15pt;
    }

    .nav-item .nav-link:hover {
      color: red;
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <?php
  ob_start();
  session_start();
  ?>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="../admin/product.php"><img src="https://raw.githubusercontent.com/tuan24072002/icon/main/software-engineer.png" width="50px" height="50px"></a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../admin/product.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../admin/user.php">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../admin/order.php">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../admin/blacklist.php">Blacklist</a>
          </li>
          <?if(isset($_SESSION['login'])):?>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../admin/logout.php">Logout</a>
          </li>
          <?endif;?>
        </ul>
      </div>
    </div>
  </nav>