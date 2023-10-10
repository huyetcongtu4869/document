<?php include_once "views/admin/layout/header.php" ?>

<article>
    <div class="headline">
        <h2>QUẢN LÝ HÀNG HÓA</h2>
        <?php if (isset($_COOKIE['message'])) : ?>
            <div>
                <?= $_COOKIE['message'] ?>
            </div>
        <?php endif ?>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Lượt xem</th>
                <th>Ngày đăng</th>
                <th>
                    <a href="?ctr=add-hang-hoa">Thêm</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hang_hoa as $hh) : ?>
                <tr>
                    <td><?= $hh['ma_hh'] ?></td>
                    <td>
                        <img src="public/images/<?= $hh['hinh'] ?>" width="123" alt="">
                    </td>
                    <td><?= $hh['ten_hh'] ?></td>
                    <td><?= $hh['don_gia'] ?></td>
                    <td><?= $hh['so_luot_xem'] ?></td>
                    <td><?= $hh['ngay_nhap'] ?></td>
                    <td>
                        <button class="btn btn-default"><a href="?ctr=edit-hang-hoa&ma_hh=<?= $hh['ma_hh'] ?>">Sửa</a></button>
                        <button class="btn btn-danger"><a href="?ctr=del-hang-hoa&ma_hh=<?= $hh['ma_hh'] ?>">Xóa</a></button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</article>

<?php include_once "views/admin/layout/footer.php" ?>