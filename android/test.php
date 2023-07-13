<?php
    require 'connect.php';
    require 'validate.php';
    $password='admin123';
    $hash=password_hash($password,PASSWORD_DEFAULT);
    var_dump(password_verify($password,$hash));