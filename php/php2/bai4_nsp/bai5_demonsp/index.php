<?php
// require_once 'controllers/CategoryController.php';
// require_once 'models/Product.php';
// require_once 'controllers/CustomerController.php';
require_once 'vendor/autoload.php';

use  App\Controllers\CategoryController;
use  App\Models\Product;
use  App\Controllers\CustomerController;

$categoryController = new CategoryController();
$product = new Product();
$customerController = new CustomerController();
