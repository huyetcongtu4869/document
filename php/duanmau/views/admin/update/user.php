<?php include_once "views/admin/layout/header.php" ?>
<h1>Update sản phẩm</h1>
</div>
<form action="?ctr=update-user" method="post" enctype="multipart/form-data">
    <div class="row">
        <input class="form-control" type="text" name="Id" value="<?= $user['Id'] ?>" hidden>
        <div class="col">
            <div class="form-group">
                <label for="">Tên user</label>
                <input class="form-control" type="text" name="name" placeholder="tên hàng" value="<?= $user['userName'] ?>">
                <span style="color: red;"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <input type="hidden" name="hinh" value="<?= $user['avartar'] ?>">
                <label for="">Hình</label>
                <img src="<?= $user['avartar'] ?>" width="100" alt="">
                <br>
                <input type="file" name="hinh" placeholder="">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Password</label>
                <input class="form-control" type="text" name="pass" value="<?= $user['password'] ?>">
                <span style="color: red;"><?= isset($errors['pass']) ? $errors['pass'] : '' ?></span>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Level</label>
                <input class="form-control" type="text" name="level" value="<?= $user['level'] ?>">
                <span style="color: red;"><?= isset($errors['level']) ? $errors['level'] : '' ?></span>
            </div>
        </div>
    </div>
    <button class="btn" type="submit" name="btn_insert">Cập nhật</button>
</form>
</article>