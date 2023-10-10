<?php include_once "views/admin/layout/header.php" ?>
<h1>Thêm danh mục</h1>
</div>
<form action="?ctr=save_add_category" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="">Tên danh mục</label>
                <input class="form-control" type="text" name="name" placeholder="Tên danh mục" value="<?= isset($data_old[0]) ? $data_old[0] : '' ?>">
                <span style="color: red;"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
            </div>
        </div>
    </div>
    <button class="btn" type="submit" name="btn_insert">Thêm</button>
</form>
</article>