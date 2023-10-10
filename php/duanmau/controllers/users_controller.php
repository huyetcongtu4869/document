<?php
function show_admin_user()
{
    render('admin/list_users', ['users' => user_all()]);
}

//Hiển thị form thêm hàng hóa
function form_add_user()
{
    render("admin/add/user");
}

//lưu dữ liệu vào csdl khi thêm
function save_add_user()
{
    // var_dump($_POST);
    // die;
    extract($_POST);
    //Lấy dữ liệu hình ảnh
    $image = $_FILES['image'];
    //Lấy tên ảnh
    $imgname = $image['name'];
    $data = [
        $userName,
        $imgname,
        $password,
        $level
    ];
    //Validate
    //Validate ảnh
    if ($image['size'] == 0) {
        $errors['image'] = "Bạn chưa chọn hình";
    }
    if ($userName == '') {
        $errors['userName'] = "Bạn chưa nhập tên đăng nhập";
    }
    if ($password == '') {
        $errors['password'] = "Bạn chưa nhập mật khẩu";
    }
    if ($level == '') {
        $errors['level'] = "Bạn chưa level";
    }
    if ($image['size'] > 0) {
        $file_type = ['jpg', 'png', 'gif'];
        $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        if (!in_array($file_extension, $file_type)) {
            $errors['avartar'] = " Hình phải có định dạng jpg, png hoặc gif";
        }
    }

    //Nếu không có lỗi
    if (!isset($errors)) {
        //upload
        //Insert dữ liệu
        move_uploaded_file($image['tmp_name'], "public/img/img-user/" . $imgname);
        user_insert($data);
        setcookie('message', 'Thêm dữ liệu thành công', time() + 1);
        header("location: ?ctr=list_users");
        die;
    } else {
        //Nếu có lỗi
        render(
            "admin/add/user",
            [
                'errors' => $errors,
                'data_old' => $data
            ]
        );
    }
}
function shearch_user()
{
    render(
        "admin/list_users",
        [
            'users' => conn_shearch_user($_POST['userName'])
        ]
    );
}
//Edit hàng hóa (hiển thị form)
function edit_user()
{
    //Lấy mã hh trên URL
    //lấy ra bản ghi hàng hóa cần sửa
    render(
        "admin/update/user",
        [
            'user' => user_one($_GET['Id'])
        ]
    );
}

//Update hàng hóa (Cập nhật vào database)
function update_user()
{
    extract($_POST);
    //Lấy dữ liệu hình ảnh

    //Tạo mảng data để insert dữ liệu
    $data = [
        $name,
        $hinh,
        $pass,
        $level,
        $Id
    ];
    //Insert dữ liệu
    user_update($data);
    setcookie('message', 'Cập nhật dữ liệu thành công', time() + 1);
    header("location: ?ctr=list_users");
    die;
}

//Xóa hàng hóa
function del_user()
{
    user_delete($_GET['Id']);
    setcookie('message', 'Xóa dữ liệu thành công', time() + 1);
    header("location: ?ctr=list_users");
    die;
}
