<?php
function show_form_signin()
{
    render("sign-in");
}
function sign_in()
{
    session_start();

    extract($_POST);
    $data = [
        $userName,
        $password
    ];
    if (!$_POST["userName"] == "" && !$_POST["password"] == "") { //kiểm tra xem username và password có trống hay không
        foreach (user_all() as $value) { //lặp để kiểm tra dữ liệu nhập vào form và dữ liệu trong DB
            if ($_POST["userName"] == $value["userName"] && $_POST["password"] == $value["password"]) { // kiểm tra xem username và password nhập vào có trùng với username và password trong DB hay không
                // $_SESSION["userName"] = $_POST["userName"]; //nếu khớp dữ liệu trong DB thì gán dữ liệu username vào session thông qua key là username
                // $data = user_one($_POST["password"]);
                $_SESSION["userName"] = $value["userName"];
                $_SESSION["avartar"] = $value["avartar"];
                $_SESSION["Id"] = $value["Id"];
                if ($value["level"] == 0) {
                    header("location: ?ctr=list_products");
                } else {
                    header("location: ?ctr=home");
                }
                die;
            } else {
                $errors['signin'] = "Tên đăng nhập hoặc mật khẩu của bạn chưa chính xác";
                render(
                    "sign-in",
                    [
                        'errors' => $errors,
                        'data_old' => $data
                    ]
                );
            }
        }
    }
}
function sign_out()
{
    session_start();
    session_destroy();
    header("location: ?ctr=form-sign-in");
}
function show_form_signup()
{
    render("sign-up");
}
function sign_up()
{
    extract($_POST);
    $data = [
        $username,
        $avartar,
        $pass,
        $level,
    ];
    foreach (user_all() as  $value) {
        if ($username == $value["userName"]) {
            $errors['userName'] = "Tên đăng nhập đã tồn tại";
            die;
        }
    }
    if ($pass != $_POST['re-password']) {
        $errors['checkPass'] = "Tên đăng nhập đã tồn tại";
    }
    if (!isset($errors)) {
        //upload
        //Insert dữ liệu
        user_insert($data);

        setcookie('message', 'Thêm dữ liệu thành công', time() + 1);
        session_start();
        $_SESSION["userName"] = $username;
        $_SESSION["avartar"] = $avartar;
        header("location: ?ctr=home");
    } else {
        render(
            "sign-up",
            [
                'errors' => $errors,
                'data_old' => $data
            ]
        );
    }
}
function show_acc_setting()
{
    render("setting-account", [
        'acc' => user_one($_GET['id'])
    ]);
}
function update_acc()
{
    extract($_POST);
    $dtavartar = $_FILES['hinh'];
    if ($dtavartar['size'] > 0) {
        $hinh = $dtavartar['name'];
        //upload
        move_uploaded_file($dtavartar['tmp_name'], "public/img/img-user" . $hinh);
    }
    $data = [
        $userName,
        $hinh,
        $password,
        $level,
        $id,
    ];
    $repassword;

    var_dump($data);
    if ($password != '' && $userName != '' && $repassword == $password) {
        user_update($data);
        session_start();
        $_SESSION["userName"] = $userName;
        $_SESSION["avartar"] = $hinh;
    }

    header("location: ?ctr=home");
}
