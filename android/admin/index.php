<?php
require 'inc/header.php';
require '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $selectOne = "SELECT * FROM taikhoan WHERE username='$username'";
        $data = mysqli_query($conn, $selectOne);
        $row = mysqli_fetch_assoc($data);
        if (password_verify($password, $row['password'])) {
            $sql = "SELECT * FROM taikhoan WHERE username='$username' and password='{$row['password']}' and role=1";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                $_SESSION['login'] = $username;
                header('location: product.php');
            } else {
                header('location: index.php?error=Invalid admin username or password !!!');
            }
        }
    }
}
?>
<style>
    .error {
        margin-top: 5%;
        background: #F2DEDE;
        color: #A94442;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
    }

    form {
        border: 5px solid red;
        height: auto;
        margin-left: 37.5%;
        margin-right: 37.5%;
        width: 25%;
        text-align: center;
        margin-top: 3%;
    }
    button {
        margin: 5% 5%;
    }

    form .input-box {
        margin-top: 2%;
    }
</style>
<form action="" method="post">
    <h2>Sign In</h2>
    <div class="input-box">
        <label>Username</label>
        <input style="margin-left: 2%;" type="text" id="username" name="username" required>
    </div>
    <div class="input-box">
        <label>Password</label>
        <input style="margin-left: 3%;" type="password" id="password" name="password" required>

    </div>
    <?php if (isset($_GET['error'])) : ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>
    <input type="submit" name="submit" id="submit" value="Log In" class="btn btn-dark" style="margin-top: 2%;">
</form>
<? require 'inc/footer.php'; ?>