<?php include_once "views/admin/layout/header.php" ?>
<h1>Update danh mục</h1>
</div>
<form action="?ctr=update-category" method="post" enctype="multipart/form-data">
    <div class="row">
        <input class="form-control" type="text" name="Id" value="<?= $category['categoryId'] ?>" hidden>
        <div class="col">
            <div class="form-group">
                <label for="">Tên danh mục</label>
                <input class="form-control" type="text" name="name" placeholder="tên hàng" value="<?= $category['categoryName'] ?>">
                <span style="color: red;"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
            </div>
        </div>
    </div>
    <button class="btn" type="submit" name="btn_insert">Thêm</button>
    <!-- <button class="btn"><a href="?ctr=admin-hang-hoa">Danh sách</a></button> -->
</form>
</article>