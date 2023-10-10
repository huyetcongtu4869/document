<?php
//Hiển thị toàn bộ dữ liệu trong bảng hàng hóa
function detail()
{
    render(
        'detail',
        [
            'products' => product_one($_GET['Id']),
            'comment' => comment_one($_GET['Id'])
        ]
    );
    count_view($_GET['Id'], product_one($_GET['Id'])['view'] + 1);
}

//Hiện hàng hóa trong admin
function show_admin_hang_hoa()
{
    render(
        'admin/list_products',
        ['hang_hoa' => hang_hoa_all()],
        ['categorys' => category_all()]
    );
}
function show_comment_product()
{

    render(
        'admin/comment',
        [
            'products' => product_one($_GET['Id']),
            'comment' => comment_one($_GET['Id'])
        ]
    );
}
//Hiển thị form thêm hàng hóa
function form_add_product()
{
    render("admin/add/product", ['categorys' => category_all()]);
}

//lưu dữ liệu vào csdl khi thêm
function save_add_product()
{
    extract($_POST);
    //Lấy dữ liệu hình ảnh
    $image = $_FILES['image'];
    //Lấy tên ảnh
    $imgname = $image['name'];
    //Tạo mảng data để insert dữ liệu
    $data = [
        $name,
        $imgname,
        $price,
        $desc,
        $categorys,
    ];
    //Validate
    if ($image['size'] == 0) {
        $errors['image'] = "Bạn chưa chọn hình";
    }
    if ($desc == '') {
        $errors['desc'] = "Bạn chưa nhập mô tả";
    }
    if ($name == '') {
        $errors['name'] = "Bạn chưa nhập tên";
    }
    if ($price == '' || is_double($price)==false) {
        $errors['price'] = "Bạn chưa nhập giá";
    }
    if ($categorys == 0) {
        $errors['category'] = "Bạn chọn loại hàng";
    }
    //Validate ảnh
    if ($image['size'] > 0) {
        $file_type = ['jpg', 'png', 'gif'];
        $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        if (!in_array($file_extension, $file_type)) {
            $errors['image'] = " Hình phải có định dạng jpg, png hoặc gif";
        }
    }
    //Nếu không có lỗi
    if (!isset($errors) && is_double($price)) {
        //upload
        move_uploaded_file($image['tmp_name'], "public/img/img-product/" . $imgname);
        //Insert dữ liệu
        product_insert($data);
        setcookie('message', 'Thêm dữ liệu thành công', time() + 1);
        header("location: ?ctr=list_products");
        die;
    } else {
        //Nếu có lỗi
        render(
            "admin/add/product",
            [
                'categorys' => category_all(),
                'errors' => $errors,
                'data_old' => $data
            ]
        );
    }
}

function shearch_products()
{
    render('admin/list_products', ['hang_hoa' => shearch($_POST['productName'])]);
}

//Edit hàng hóa (hiển thị form)
function edit_product()
{
    //Lấy mã hh trên URL
    //Lấy danh sách loại hàng để đưa vào list
    //lấy ra bản ghi hàng hóa cần sửa
    render(
        "admin/update/product",
        [
            'product' => product_one($_GET['Id']),
            'categorys' => category_all()
        ]
    );
}

//Update hàng hóa (Cập nhật vào database)
function update_product()
{
    extract($_POST);
    //Lấy dữ liệu hình ảnh
    $image = $_FILES['hinh'];
    $hinh_cu;
    //Kiểm tra nếu người dùng có cập nhật hình thì lấy hình mới, còn không thì vẫn lưu hình cũ
    if ($image['size'] > 0) {
        $hinh = $image['name'];
        //upload
        move_uploaded_file($image['tmp_name'], "public/img/img-product" . $hinh);
    }
    if ($image['size'] == 0) {
        $hinh = $hinh_cu;
    }
    //Tạo mảng data để insert dữ liệu

    $data = [
        $name,
        $hinh,
        $price,
        $desc,
        $idCategory,
        $Id
    ];
    // var_dump($hinh);
    // var_dump($hinh_cu);
    // die;
    hang_hoa_update($data);
    setcookie('message', 'Cập nhật dữ liệu thành công', time() + 1);
    header("location: ?ctr=list_products");
    die;
}

//Xóa hàng hóa
function del_product()
{
    hang_hoa_delete($_GET['Id']);
    setcookie('message', 'Xóa dữ liệu thành công', time() + 1);
    header("location: ?ctr=list_products");
}
function del_comment()
{
    comment_delete($_GET['Id']);
    setcookie('message', 'Xóa dữ liệu thành công', time() + 1);
    header("location:" . $_SERVER['HTTP_REFERER']);
}
