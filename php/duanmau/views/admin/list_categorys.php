<?php include_once "views/admin/layout/header.php" ?> 
<h1>Quản lý danh mục</h1>
</div>
<div class="control-product">
    <div class="control">
        <div class="title">
            <h3>Danh sách danh mục</h3>
        </div>
        <div class="control-action">
            <div class="search">
                <form action="?ctr=shearch_category" method="post" enctype="multipart/form-data">
                    <input type="text" name="categoryName" placeholder="Aspen Weste" value="">
                    <button id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <a href="?ctr=form_add_category"><button class="add">Add New category</button></a>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (category_all() as $value) : ?>
                <?php if ( $value['categoryId']!=22) {
                     echo "  <tr>
                     <td>".$value['categoryId'];
                    echo "</td>
                    <td>".$value['categoryName'] ;
                    echo "</td>
                    <td class='action'>
                        <button class='up'><a href='?ctr=edit-category&Id=".$value['categoryId'];
                        echo"'>Sửa</a></button>
                        <button class='de'><a href='?ctr=del-category&Id=".$value['categoryId'] ;
                        echo "''onclick='return confirm('Bạn có xác nhận xóa không?')'>Xóa</a></button>
                        </td>
                    </tr>";
                }?>   
              
            <?php endforeach ?>