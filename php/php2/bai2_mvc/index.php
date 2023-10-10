
<?php
$url = isset($_GET['url']) == true ? $_GET['url'] : "/";
echo $url;
// die;
switch ($url) {
    case '/':
        require_once 'controllers/ProductController.php';
        echo listProduct();
        break;
    case 'add-product':
        require_once 'controllers/ProductController.php';
        echo addProduct();
        break;

    case 'form-product':
        formAddNhanVien();
        break;
    case 'add-product':
        addNhanVien();
        break;
    case 'del-product':
        
        delProduct();
        break;

    default:
        # code...
        break;
}
