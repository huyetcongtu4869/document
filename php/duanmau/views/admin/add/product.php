<?php include_once "views/admin/layout/header.php" ?>
<h1>Thêm sản phẩm</h1>
</div>
<form action="?ctr=save_add_product" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="">Tên hàng hóa</label>
                <input class="form-control" type="text" name="name" placeholder="Tên hàng" value="<?= isset($data_old[0]) ? $data_old[0] : '' ?>">
                <span style="color: red;"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Đơn giá</label>
                <input class="form-control" type="text" name="price" placeholder="Giá" value="<?= isset($data_old[2]) ? $data_old[2] : '' ?>">
                <span style="color: red;"><?= isset($errors['price']) ? $errors['price'] : '' ?></span>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Loại hàng</label>
                <select class="form-control" name="categorys" id="">
                    <option value="0">Chọn loại hàng</option>
                    <?php foreach ($categorys as $value) : ?>
                        <option value="<?= $value['categoryId'] ?>" <?php echo ($value['categoryId'] == ($data_old[4] ?? '') ? 'selected' : '') ?>>
                            <?= $value['categoryName'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <span style="color: red;"><?= isset($errors['category']) ? $errors['category'] : '' ?></span>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Hình</label>
                <input type="file" name="image" placeholder="">
                <span style="color: red;"><?= isset($errors['image']) ? $errors['image'] : '' ?></span>
            </div>
        </div>
        <div class="full">
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea name="desc" value=""><?= $data_old[3] ?></textarea>
                <span style="color: red;"><?= isset($errors['desc']) ? $errors['desc'] : '' ?></span>

            </div>
        </div>

    </div>
    <button class="btn" type="submit" name="btn_insert">Thêm</button>
</form>
</article>