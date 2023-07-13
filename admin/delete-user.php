<?php
require 'inc/header-admin.php';
if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    require "./inc/init.php";
    if (empty($_GET['username'])) {
        header('location: ./index-admin.php');
    }
    $username = $_GET['username'];
    $detail = Auth::getUserByUsername($pdo, $username);
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        if (Auth::delete($pdo, $username)) {
            header('location: ./user.php');
            exit;
        }
    }
?>
    <h2><b>Delete Product</b></h2>
    <form action="" method="post">
        <table class="table mt-3">
            <tr>
                <th style="background-color: black;color:white;">Username</th>
                <td style="font-weight: bold;"><?= $detail->username; ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Name</th>
                <td style="font-weight: bold;"><?= $detail->name; ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Password</th>
                <td style="font-weight: bold;"><?= $detail->password ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Phone number</th>
                <td style="font-weight: bold;"><?= $detail->phonenumber ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Email</th>
                <td style="font-weight: bold;"><?= $detail->email ?></td>
            </tr>
            <tr>
                <th style="background-color: black;color:white;">Address</th>
                <td style="font-weight: bold;"><?= $detail->address ?></td>
            </tr>
        </table>
        <a href="user.php" class="btn btn-warning" style="width:5%;"><- Back</a>
                <input type="submit" name="submit" id="submit" value="Delete" class="btn btn-danger" onclick="return(confirm('Are you sure wanna delete this user?'));">
    </form>
<?php require 'inc/footer-admin.php';
} else {
    header('location: ../index.php');
} ?>