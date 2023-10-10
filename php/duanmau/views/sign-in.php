<?php include_once "views/layout-sign/header.php" ?>
<p class="wel">Welcomback</p>
<h1>Login to your account</h1>
<form action="?ctr=sign-in" method="post" enctype="multipart/form-data">
    <label for="">Mời bạn nhập tên</label><br>
    <input type="text" id="sign-inE" name="userName" value="<?= isset($data_old[0]) ? $data_old[0] : '' ?>"><br>
    <label for="">Passwword</label><br>
    <input type="password" id="sign-inPass" name="password" value="<?= isset($data_old[1]) ? $data_old[1] : '' ?>"><br>
    <div id="sign-in"></div><br>
    <button type="submit" id="sgoogle">Đăng Nhập</button><br>
    <span style="color: red;"><?= isset($errors['signin']) ? $errors['signin'] : '' ?></span>
    <div><a href="">Forgot password?</a>
        <p>Dont have an account? <a href="?ctr=home">Join free today</a></p>
    </div>
    <?php include_once "views/layout-sign/footer.php" ?>