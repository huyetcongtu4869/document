<?php include_once "views/admin/layout/header.php" ?>

<article>
    <div class="headline">
        <h2>QUẢN LÝ HÀNG HÓA</h2>
    </div>
    <form action="?ctr=save_add_hang_hoa" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Mã hàng hóa</label>
                    <input class="form-control" type="text" name="ma_hh" readonly placeholder="auto number" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Tên hàng hóa</label>
                    <input class="form-control" type="text" name="ten_hh" placeholder="tên hàng" value="<?= isset($data_old[0]) ? $data_old[0] : '' ?>">
                    <span style="color: red;"><?= isset($errors['ten_hh']) ? $errors['ten_hh'] : '' ?></span>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Đơn giá</label>
                    <input class="form-control" type="number" name="don_gia" min="0" value="<?= isset($data_old[1]) ? $data_old[1] : 0 ?>">
                    <span style="color: red;"><?= isset($errors['don_gia']) ? $errors['don_gia'] : '' ?></span>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Loại hàng</label>
                    <select class="form-control" name="ma_loai" id="">
                        <option value="0">Chọn loại hàng</option>
                        <?php foreach ($loai as $lo) : ?>
                            <option value="<?= $lo['ma_loai'] ?>" <?php echo ($lo['ma_loai'] == ($data_old[4] ?? '') ? 'selected' : '') ?>>
                                <?= $lo['ten_loai'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <span style="color: red;"><?= isset($errors['loai_hang']) ? $errors['loai_hang'] : '' ?></span>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Giảm giá</label>
                    <input class="form-control" type="number" name="giam_gia" placeholder="Theo phần trăm" value="<?= isset($data_old[2]) ? $data_old[2] : 0 ?>">
                    <span style="color: red;"><?= isset($errors['giam_gia']) ? $errors['giam_gia'] : '' ?></span>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Hình</label>
                    <input type="file" name="hinh" placeholder="">
                    <span style="color: red;"><?= isset($errors['hinh']) ? $errors['hinh'] : '' ?></span>
                </div>
            </div>

            <div class="full">
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="mo_ta"><?= $data_old[5] ?? '' ?></textarea>
                </div>
            </div>

        </div>
        <button class="btn" type="submit" name="btn_insert">Thêm</button>
        <button class="btn"><a href="?ctr=admin-hang-hoa">Danh sách</a></button>
    </form>
</article>

<?php include_once "views/admin/layout/footer.php" ?>