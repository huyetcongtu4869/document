<?php include_once "views/admin/layout/header.php" ?>
<h1>Quản lý user</h1>
</div>
<div class="control-product">
    <div class="control">
        <div class="title">
            <h3>Danh sách users</h3>
        </div>
        <div class="control-action">
            <div class="search">
                <form action="?ctr=shearch_user" method="post" enctype="multipart/form-data">
                    <input type="text" name="userName" placeholder="Aspen Weste" value="">
                    <button id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <a href="?ctr=form_add_user"><button class="add">Add New User</button></a>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tên User</th>
                <th>Avartar</th>
                <th>Password</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $value) : ?>
                <tr>
                    <td><?= $value['Id'] ?></td>
                    <td><?= $value['userName'] ?></td>
                    <td>
                        <img src="public/img/img-user/<?= $value['avartar'] ?>" width="123" alt="">
                    </td>
                    <td><?= $value['password'] ?></td>
                    <td><?= $value['level'] ?></td>
                    <td class="action">
                        <button class="up"><a href="?ctr=edit-user&Id=<?= $value['Id'] ?>">Sửa</a></button>
                        <button class="de"><a href="?ctr=del-user&Id=<?= $value['Id'] ?>" onclick="return confirm('Bạn có xác nhận xóa không?')">Xóa</a></button>
                    </td>
                </tr>
            <?php endforeach ?>