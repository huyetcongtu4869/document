<?php
//models
require_once "models/connection.php";
require_once "models/hang_hoa.php";
require_once "models/loai.php";
//controllers
require_once "controllers/controller.php";
require_once "controllers/home_controller.php";
require_once "controllers/errors_controller.php";
require_once "controllers/about_controller.php";
require_once "controllers/contact_controller.php";
require_once "controllers/hang_hoa_controller.php";

//Lấy thông tin controller từ URL
$ctr = isset($_GET['ctr']) ? $_GET['ctr'] : '/';

switch ($ctr) {
    case '/':
    case 'home':
        show_home();
        break;
    case 'about':
        show_about();
        break;
    case 'contact':
        show_contact();
        break;
    case 'hang-hoa':
        show_hang_hoa();
        break;
    case 'add-hang-hoa':
        add_hang_hoa();
        break;
    case 'save_add_hang_hoa':
        save_add_hang_hoa();
        break;
    case 'admin-hang-hoa':
        show_admin_hang_hoa();
        break;
    case 'edit-hang-hoa':
        edit_hang_hoa();
        break;
    case 'update-hang-hoa':
        update_hang_hoa();
        break;
    case 'del-hang-hoa':
        del_hang_hoa();
        break;
    default:
        error_404_show();
}
