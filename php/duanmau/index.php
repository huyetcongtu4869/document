<?php
//models
require_once "models/connection.php";
require_once "models/room.php";
require_once "models/user.php";
require_once "models/category.php";
require_once "models/comment.php";
//controllers
require_once "controllers/controller.php";
require_once "controllers/home_controller.php";
require_once "controllers/errors_controller.php";
require_once "controllers/about_controller.php";
require_once "controllers/contact_controller.php";
require_once "controllers/products_controller.php";
require_once "controllers/categorys_controller.php";
require_once "controllers/users_controller.php";
require_once "controllers/sign-controller.php";
require_once "controllers/comment_controller.php";
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
    case 'detail':
        detail();
        break;
        // case 'detail-comment':
        //     detail_comment();
        //     break;
    case 'show-comment-product':
        show_comment_product();
        break;
    case 'save-comment':
        save_comment();
        break;
    case 'shearch_home':
        shearch_home();
        break;
    case 'list':
        show_list();
        break;
    case 'form-sign-in':
        show_form_signin();
        break;
    case 'form-sign-up':
        show_form_signup();
        break;
    case 'acc-setting':
        show_acc_setting();
        break;
        case 'update-acc':
            update_acc();
            break;
    case 'sign-in':
        sign_in();
        break;
    case 'sign-out':
        sign_out();
        break;
    case 'sign-up':
        sign_up();
        break;
        //admin products
    case 'list_products':
        show_admin_hang_hoa();
        break;
    case 'shearch_products':
        shearch_products();
        break;
    case 'form_add_product':
        form_add_product();
        break;
    case 'save_add_product':
        save_add_product();
        break;
    case 'edit-product':
        edit_product();
        break;
    case 'update-product':
        update_product();
        break;
    case 'del-product':
        del_product();
        break;
    case 'list_categorys':
        show_admin_category();
        break;
    case 'shearch_category':
        shearch_category();
        break;
    case 'form_add_category':
        form_add_category();
        break;
    case 'save_add_category':
        save_add_category();
        break;
    case 'edit-category':
        edit_category();
        break;
    case 'update-category':
        update_category();
        break;
    case 'del-category':
        del_category();
        break;
        //end
        //admin user
    case 'list_users':
        show_admin_user();
        break;
    case 'shearch_user':
        shearch_user();
        break;
    case 'form_add_user':
        form_add_user();
        break;
    case 'save_add_user':
        save_add_user();
        break;
    case 'edit-user':
        edit_user();
        break;
    case 'update-user':
        update_user();
        break;
    case 'del-user':
        del_user();
        break;
    case 'del-comment':
        del_comment();
        break;


    default:
        error_404_show();
}
