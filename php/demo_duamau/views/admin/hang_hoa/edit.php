<?php include_once "views/admin/layout/header.php" ?>
<article>
    <div class="headline">
        <h2>QUẢN LÝ HÀNG HÓA</h2>
    </div>
    <form action="?ctr=update-hang-hoa" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Mã hàng hóa</label>
                    <input class="form-control" type="text" name="ma_hh" readonly placeholder="auto number" value="<?= $hang_hoa['ma_hh'] ?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Tên hàng hóa</label>
                    <input class="form-control" type="text" name="ten_hh" placeholder="tên hàng" value="<?= $hang_hoa['ten_hh'] ?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Đơn giá</label>
                    <input class="form-control" type="number" name="don_gia" min="0" value="<?= $hang_hoa['don_gia'] ?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Loại hàng</label>
                    <select class="form-control" name="ma_loai" id="">
                        <option value="0">Chọn loại hàng</option>
                        <?php foreach ($loai as $lo) : ?>
                            <option value="<?= $lo['ma_loai'] ?>" <?php echo ($lo['ma_loai'] == $hang_hoa['ma_loai'] ? 'selected' : '') ?>>
                                <?= $lo['ten_loai'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Giảm giá</label>
                    <input class="form-control" type="number" name="giam_gia" value="<?= $hang_hoa['giam_gia'] ?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <!-- Giữ lại hình ảnh cũ -->
                    <input type="hidden" name="hinh" value="<?= $hang_hoa['hinh'] ?>">
                    <label for="">Hình</label>
                    <img src="public/images/<?= $hang_hoa['hinh'] ?>" width="100" alt="">
                    <br>
                    <input type="file" name="hinh" placeholder="">
                </div>
            </div>

            <div class="full">
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="mo_ta"><?= $hang_hoa['mo_ta'] ?></textarea>
                </div>
            </div>

        </div>
        <button class="btn" type="submit" name="btn_update">Cập nhật</button>
        <button class="btn"><a href="?ctr=admin-hang-hoa">Danh sách</a></button>
    </form>
</article>

<?php include_once "views/admin/layout/footer.php" ?>