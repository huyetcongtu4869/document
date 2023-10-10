<?php include_once "views/admin/layout/header.php" ?>
<h1>Quản lý sản phẩm</h1>
</div>
<div class="control-product">
    <div class="control">
        <div class="title">
            <h3>Danh sách sản phẩm</h3>
        </div>
        <div class="control-action">
            <div class="search">
                <form action="?ctr=shearch_products" method="post" enctype="multipart/form-data">
                    <input type="text" name="productName" placeholder="Aspen Weste" value="">
                    <button id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <a href="?ctr=form_add_product"><button class="add">Thêm mới sản phẩm</button></a>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th style="width: 40px;">#</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Số lượt xem</th>
                <th style="width: 130px;">Ngày thêm</th>
                <th style="width: 30px;">Danh mục</th>
                <th>Bình luận</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hang_hoa as $value) : ?>
                <tr>
                    <td><?= $value['Id'] ?></td>
                    <td><?= $value['productName'] ?></td>
                    <td>
                        <img src="public/img/img-product/<?= $value['productImage'] ?>" width="123" alt="">
                    </td>
                    <td><?= $value['productPrice'] ?> vnđ</td>
                    <td><?= $value['productDesc'] ?></td>
                    <td><?= $value['view'] ?></td>
                    <td><?= $value['date'] ?></td>
                    <td><?= category_one($value['categoryId'])['categoryName'] ?></td>
                    <td><a href="?ctr=show-comment-product&Id=<?= $value['Id'] ?>">Show Bình luận</a></td>
                    <td class="action">
                        <button class="up"><a href="?ctr=edit-product&Id=<?= $value['Id'] ?>">Sửa</a></button>
                        <button class="de"><a href="?ctr=del-product&Id=<?= $value['Id'] ?>" onclick="return confirm('Bạn có xác nhận xóa không?')">Xóa</a></button>
                    </td>
                </tr>
            <?php endforeach ?>