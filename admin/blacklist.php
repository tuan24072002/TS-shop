<?php
require 'inc/header-admin.php';
if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    require "./inc/init.php";
    $data = Auth::getAllUserBlacklist($pdo);

?>
    <style>
        th {
            text-align: center;
        }

        td {
            text-align: center;
        }
    </style>
    <h3>Black list</h3>
    <table class="table table-primary">
        <thead class="table-dark">
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Password</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Address</th>
                <th style="width: 240px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $user) : ?>
                <tr>
                    <?php foreach (get_object_vars($user) as $key => $value) : ?>
                        <?php if ($key != 'role' && $key != 'blacklist' && $key != 'token' && $key != 'lasttime') :
                            if ($key == 'username') : ?>
                                <td><?= $value ?></td>
                            <?php elseif ($key == 'name') : ?>
                                <td><?= $user->password ?></td>
                            <?php elseif ($key == 'password') : ?>
                                <td><?= $user->name ?></td>
                            <?php else : ?>
                                <td><?= $value ?></td>
                        <?php endif;
                        endif; ?>
                    <?php endforeach; ?>
                    <td>
                        <a href="delete-user.php?username=<?= $user->username ?>" style="width:5%;text-decoration: none; color: red;font-weight: bold;"> Delete</a>
                        <a href="out-blacklist.php?username=<?= $user->username ?>" style="width:5%;text-decoration: none;color: blue;font-weight: bold;">/ Out of BlackList</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php require 'inc/footer-admin.php';
} else {
    header('location: ../index.php');
} ?>