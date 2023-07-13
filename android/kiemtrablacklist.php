<?php
require 'connect.php';
require 'validate.php';
$username = validate($_GET['username']);
 $sql="SELECT blacklist FROM taikhoan WHERE username='$username'";
$data=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($data);
    if($row['blacklist']==0){
        echo 'Successful';
    }
    else{
        echo 'Failed';
    }

$conn->close();
