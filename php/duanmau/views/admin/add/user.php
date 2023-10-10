<?php include_once "views/admin/layout/header.php" ?>
<h1>Thêm user</h1>
</div>
<form action="?ctr=save_add_user" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="">Tên đăng nhập</label>
                <input class="form-control" type="text" name="userName" value="<?= isset($data_old[0]) ? $data_old[0] : '' ?>">
                <span style="color: red;"><?= isset($errors['userName']) ? $errors['userName'] : '' ?></span>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Avartar</label>
                <input type="file" name="image" placeholder="">
                <span style="color: red;"><?= isset($errors['image']) ? $errors['image'] : '' ?></span>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Password</label>
                <input class="form-control" type="text" name="password" value="<?= isset($data_old[2]) ? $data_old[2] : '' ?>">
                <span style="color: red;"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">level</label>
                <input class="form-control" type="text" name="level" value="<?= isset($data_old[3]) ? $data_old[3] : '' ?>">
                <span style="color: red;"><?= isset($errors['level']) ? $errors['level'] : '' ?></span>
            </div>
        </div>
    </div>
    <button class="btn" type="submit" name="btn_insert">Thêm user</button>
</form>
</article>