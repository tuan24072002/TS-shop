<?php
require 'inc/header.php';
if(isset($_SESSION['login'])){
require "class/Database.php";
require 'class/Account.php';
$db = new Database();
$pdo = $db->connectDB();
$id=$_GET['id'];
$detail = Account::getOneByID($pdo, $id);
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])){
    if(Account::delete($pdo,$id)){
        header('location: user.php');
        exit;
    }
}
?>
<h2><b>Delete User</b></h2>
<form action="" method="post">
<table class="table mt-3">
    <tr>
        <th style="background-color: black;color:white;">Username</th>
        <td style="font-weight: bold;"><?= $detail->username; ?></td>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">Password</th>
        <td style="font-weight: bold;"><?= $detail->password; ?></td>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">Name</th>
        <td style="font-weight: bold;"><?= $detail->name ?></td>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">Phone Number</th>
        <td style="font-weight: bold;"><?= $detail->sodienthoai ?></td>
    </tr>
    <tr>
        <th style="background-color: black;color:white;">Address</th>
        <td style="font-weight: bold;"><?= $detail->diachi ?></td>
    </tr>
</table>
<a href="user.php" class="btn btn-warning"style="width:5%;"><- Back</a>
<input type="submit" name="submit" id="submit" value="Delete" class="btn btn-danger" onclick="return(confirm('Are you sure wanna delete this user?'));">
</form>
<? require 'inc/footer.php'; ?>
<?php
}else{
    header('location: index.php');
}?>