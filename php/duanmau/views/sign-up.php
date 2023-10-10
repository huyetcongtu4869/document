<?php include_once "views/layout-sign/header.php" ?>
<p class="wel">Welcom</p>
<h1>Signup to your account</h1>
<form action="?ctr=sign-up" method="post" enctype="multipart/form-data">

        <label for="">Tên đăng nhập</label><br>
        <input type="text" id="ten" name="username" placeholder="John.snow" value="<?= isset($data_old[0]) ? $data_old[0] : '' ?>"><br>
        <span style="color: red;"><?= isset($errors['userName']) ? $errors['userName'] : '' ?></span>
        <label for="">Password</label><br>
        <input type="password" id="pass" name="pass" placeholder="*********" value="<?= isset($data_old[2]) ? $data_old[2] : '' ?>"><br>
        <label for="">Re-Password</label><br>
        <input type="password" id="re-pass" name="re-password" placeholder="*********"><br>
        <span style="color: red;"><?= isset($errors['checkPass']) ? $errors['checkPass'] : '' ?></span>
        <input type="text" name="level" hidden value="1">
        <input type="text" name="avartar" hidden value="avartar.png">
        <button type="submit" id="creat">Đăng kí</button>
        <?php include_once "views/layout-sign/footer.php" ?>