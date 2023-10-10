<?php
//Show danh mục
function show_list()
{
    render(
        "list",
        [
            'products' => product_category($_GET['categoryId']),
        ]
    );
}
function shearch_home()
{
    render('list', ['products' => shearch($_POST['productName'])]);
}


































//Show danh mục tại trang admin
function show_admin_category()
{
    render('admin/list_categorys', ['categorys' => category_all()]);
}

//Hiển thị form thêm hàng hóa
function form_add_category()
{
    render("admin/add/category");
}

//lưu dữ liệu vào csdl khi thêm
function save_add_category()
{
    // var_dump($_POST);
    // die;
    extract($_POST);
    //Lấy dữ liệu hình ảnh
    $data = [
        $name,
    ];
    //Validate

    //Validate ảnh

    if ($name == '') {
        $errors['name'] = "Bạn chưa nhập danh mục";
    }

    //Nếu không có lỗi
    if (!isset($errors)) {
        //upload
        //Insert dữ liệu
        category_insert($data);
        setcookie('message', 'Thêm dữ liệu thành công', time() + 1);
        header("location: ?ctr=list_categorys");
        die;
    } else {
        //Nếu có lỗi
        render(
            "admin/add/category",
            [
                'errors' => $errors,
                'data_old' => $data
            ]
        );
    }
}
//Show hàng hóa dc search
function shearch_category()
{
    render('admin/list_categorys', ['categorys' => conn_shearch_category($_POST['categoryName'])]);
}
//Edit hàng hóa (hiển thị form)
function edit_category()
{
    render(
        "admin/update/category",
        [
            'category' => category_one($_GET['Id'])
        ]
    );
}

//Update hàng hóa (Cập nhật vào database)
function update_category()
{
    extract($_POST);
    //Lấy dữ liệu hình ảnh

    //Tạo mảng data để insert dữ liệu
    $data = [
        $name,
        $Id
    ];
    //Insert dữ liệu
    category_update($data);
    setcookie('message', 'Cập nhật dữ liệu thành công', time() + 1);
    header("location: ?ctr=list_categorys");
    die;
}

//Xóa hàng hóa
function del_category()
{
    category_delete($_GET['Id']);
    setcookie('message', 'Xóa dữ liệu thành công', time() + 1);
    header("location: ?ctr=list_categorys");
    die;
}
