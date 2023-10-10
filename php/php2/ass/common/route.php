<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function () {
    if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
        header('location: ' . BASE_URL . 'login');
        die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function () {
    return "trang chủ";
});
$router->get('product-list', [App\Controllers\ProductController::class, 'productList']);
$router->get('add-product', [App\Controllers\ProductController::class, 'addProduct']);
$router->post('add-product-post', [App\Controllers\ProductController::class, 'addProductPost']);
$router->get('edit-product/{id}', [App\Controllers\ProductController::class, 'editProduct']);
$router->post('edit-product-post/{id}', [App\Controllers\ProductController::class, 'editProductPost']);
$router->get('delete-product/{id}', [App\Controllers\ProductController::class, 'deleteProduct']);



$router->get('category-list', [App\Controllers\CategoryController::class, 'categoryList']);
$router->get('add-category', [App\Controllers\CategoryController::class, 'addCategory']);
$router->post('add-category-post', [App\Controllers\CategoryController::class, 'addCategoryPost']);
$router->get('edit-category/{id}', [App\Controllers\CategoryController::class, 'editCategory']);
$router->post('edit-category-post/{id}', [App\Controllers\CategoryController::class, 'editCategoryPost']);
$router->get('delete-category/{id}', [App\Controllers\CategoryController::class, 'deleteCategory']);





$router->get('user-list', [App\Controllers\UserController::class, 'userList']);
$router->get('add-user', [App\Controllers\UserController::class, 'addUser']);
$router->post('add-user-post', [App\Controllers\UserController::class, 'addUserPost']);
$router->get('edit-user/{id}', [App\Controllers\UserController::class, 'editUser']);
$router->post('edit-user-post/{id}', [App\Controllers\UserController::class, 'editUserPost']);
$router->get('delete-user/{id}', [App\Controllers\UserController::class, 'deleteUser']);



$router->get('service-list', [App\Controllers\ServiceController::class, 'serviceList']);
$router->get('add-service', [App\Controllers\ServiceController::class, 'addService']);
$router->post('add-service-post', [App\Controllers\ServiceController::class, 'addServicePost']);
$router->get('edit-service/{id}', [App\Controllers\ServiceController::class, 'editService']);
$router->post('edit-service-post/{id}', [App\Controllers\ServiceController::class, 'editServicePost']);
$router->get('delete-service/{id}', [App\Controllers\ServiceController::class, 'deleteService']);




$router->get('sale-list', [App\Controllers\SaleController::class, 'saleList']);
$router->get('add-sale', [App\Controllers\saleController::class, 'addSale']);
$router->post('add-sale-post', [App\Controllers\SaleController::class, 'addSalePost']);
$router->get('edit-sale/{id}', [App\Controllers\SaleController::class, 'editSale']);
$router->post('edit-sale-post/{id}', [App\Controllers\SaleController::class, 'editSalePost']);
$router->get('delete-sale/{id}', [App\Controllers\SaleController::class, 'deleteSale']);
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
