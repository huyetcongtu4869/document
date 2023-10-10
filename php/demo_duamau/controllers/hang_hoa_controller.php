<?php
//Hiển thị toàn bộ dữ liệu trong bảng hàng hóa
function show_hang_hoa()
{
    $hang_hoa = hang_hoa_all();
    render('list_hang_hoa', ['hang_hoa' => $hang_hoa]);
}

//Hiện hàng hóa trong admin
function show_admin_hang_hoa()
{
    $hang_hoa = hang_hoa_all();
    render('admin/hang_hoa/list', ['hang_hoa' => $hang_hoa]);
}

//Hiển thị form thêm hàng hóa
function add_hang_hoa()
{
    $loai = loai_all();
    render("admin/hang_hoa/add", ['loai' => $loai]);
}

//lưu dữ liệu vào csdl khi thêm
function save_add_hang_hoa()
{
    // var_dump($_POST);
    // die;
    extract($_POST);
    //Lấy dữ liệu hình ảnh
    $image = $_FILES['hinh'];
    //Lấy tên ảnh
    $hinh = $image['name'];
    //Tạo mảng data để insert dữ liệu
    $data = [
        $ten_hh,
        $don_gia,
        $giam_gia,
        $hinh,
        $ma_loai,
        $mo_ta
    ];
    //Validate
    if ($ten_hh == "") {
        $errors['ten_hh'] = "Bạn chưa nhập tên hàng hóa";
    }
    if ($don_gia == '' || $don_gia <= 0) {
        $errors['don_gia'] = "Bạn nhập giá chưa đúng giá phải > 0";
    }
    if ($giam_gia == '' || $giam_gia < 0) {
        $errors['giam_gia'] = "Giảm giá phải >= 0";
    }
    if ($ma_loai == 0) {
        $errors['loai_hang'] = "Bạn chưa chọn loại hàng";
    }
    //Validate ảnh
    if ($image['size'] > 0) {
        $file_type = ['jpg', 'png', 'gif'];
        $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        if (!in_array($file_extension, $file_type)) {
            $errors['hinh'] = " Hình phải có định dạng jpg, png hoặc gif";
        }
    }
    //Nếu không có lỗi
    if (!isset($errors)) {
        //upload
        move_uploaded_file($image['tmp_name'], "public/images/" . $hinh);

        //Insert dữ liệu
        hang_hoa_insert($data);
        setcookie('message', 'Thêm dữ liệu thành công', time() + 1);
        header("location: ?ctr=admin-hang-hoa");
        die;
    } else {
        //Nếu có lỗi
        $loai = loai_all();
        render(
            "admin/hang_hoa/add",
            [
                'loai' => $loai,
                'errors' => $errors,
                'data_old' => $data
            ]
        );
    }
}

//Edit hàng hóa (hiển thị form)
function edit_hang_hoa()
{
    //Lấy mã hh trên URL
    $ma_hh = $_GET['ma_hh'];
    //Lấy danh sách loại hàng để đưa vào list
    $loai = loai_all();
    //lấy ra bản ghi hàng hóa cần sửa
    $hang_hoa = hang_hoa_one($ma_hh);
    render(
        "admin/hang_hoa/edit",
        [
            'hang_hoa' => $hang_hoa,
            'loai' => $loai
        ]
    );
}

//Update hàng hóa (Cập nhật vào database)
function update_hang_hoa()
{
    extract($_POST);
    //Lấy dữ liệu hình ảnh
    $image = $_FILES['hinh'];
    //Kiểm tra nếu người dùng có cập nhật hình thì lấy hình mới, còn không thì vẫn lưu hình cũ
    if ($image['size'] > 0) {
        $hinh = $image['name'];
        //upload
        move_uploaded_file($image['tmp_name'], "public/images/" . $hinh);
    }

    //Tạo mảng data để insert dữ liệu
    $data = [
        $ten_hh,
        $don_gia,
        $giam_gia,
        $hinh,
        $ma_loai,
        $mo_ta,
        $ma_hh
    ];
    //Insert dữ liệu
    hang_hoa_update($data);
    echo "<pre>";
    var_dump($data);
    setcookie('message', 'Cập nhật dữ liệu thành công', time() + 1);
    // header("location: ?ctr=admin-hang-hoa");
    die;
}

//Xóa hàng hóa
function del_hang_hoa()
{
    $ma_hh = $_GET['ma_hh'];
    hang_hoa_delete($ma_hh);
    setcookie('message', 'Xóa dữ liệu thành công', time() + 1);
    header("location: ?ctr=admin-hang-hoa");
    die;
}
