<?php include_once "views/layout-sign/header.php" ?>
<p class="wel">Welcom</p>
<h1>Setting account</h1>
<form action="?ctr=update-acc" method="post" enctype="multipart/form-data">
    <label for="">Tên đăng nhập</label><br>
    <input type="text" id="ten" class="input" name="userName" value="<?= $acc['userName'] ?>"><br>
    <label for="">Password</label><br>
    <input type="password" id="pass" class="input" name="password" value="<?= $acc['userName'] ?>"><br>
    <label for="">Re-Password</label><br>
    <input type="password" id="re-pass" class="input" name="repassword" placeholder="*********"><br>
    <label for="">Avartar</label><br>
    <img src="public/img/img-user/<?= $acc['avartar'] ?>" alt="">
    <input type="file" name="hinh">
    <input type="text" hidden name="level" value="1">
    <input type="text" hidden name="id" value="<?= $acc['Id'] ?>">
    <button type="submit" id="creat">Đăng kí</button>
    <?php include_once "views/layout-sign/footer.php" ?>