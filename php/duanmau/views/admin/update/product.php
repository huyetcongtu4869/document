<?php include_once "views/admin/layout/header.php" ?>
<h1>Update sản phẩm</h1>
</div>
<form action="?ctr=update-product" method="post" enctype="multipart/form-data">
    <div class="row">
        <input class="form-control" type="text" name="Id" value="<?= $product['Id'] ?>" hidden>
        <div class="col">
            <div class="form-group">
                <label for="">Tên hàng hóa</label>
                <input class="form-control" type="text" name="name" placeholder="tên hàng" value="<?= $product['productName'] ?>">
                <span style="color: red;"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Đơn giá</label>
                <input class="form-control" type="text" name="price" value="<?= $product['productPrice'] ?>">
                <span style="color: red;"><?= isset($errors['price']) ? $errors['price'] : '' ?></span>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Loại hàng</label><br>
                <select class="form-control" name="idCategory" id="">
                    <option value="0">Chọn loại hàng</option>
                    <?php foreach ($categorys as $value) : ?>
                        <option value="<?= $value['categoryId'] ?>" <?php echo ($value['categoryId'] == $product['categoryId'] ? 'selected' : '') ?>>
                            <?= $value['categoryName'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <span style="color: red;"><?= isset($errors['category']) ? $errors['category'] : '' ?></span>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <img src="public/img/img-product/<?= $product['productImage'] ?>" width="123" alt="">
                <label for="">Hình</label>
                <img src="public/images/<?= $product['productImage'] ?>" width="100" alt="">
                <br>
                <input type="file" name="hinh" placeholder="">
                <input type="text" hidden name="hinh_cu" value="<?= $product['productImage'] ?>">
            </div>
        </div>
        <div class="full">
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea name="desc"><?= $product['productDesc'] ?></textarea>
                <span style="color: red;"><?= isset($errors['desc']) ? $errors['desc'] : '' ?></span>

            </div>
        </div>

    </div>
    <button class="btn" type="submit" name="btn_insert">Cập nhật</button>
</form>
</article>