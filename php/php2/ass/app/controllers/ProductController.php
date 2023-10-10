<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends BaseController
{
    public $product;
    public $cate;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function productList()
    {
        $title = "Đây là trang sản phẩm";
        $product = $this->product->getProduct();
        $this->render('product.list', compact('title', 'product'));
    }
    public function addProduct()
    {
        $data = new Category();
        $cate = $data->getCategory();
        $this->render('product.add', compact('cate'));
    }
    public function addProductPost()
    {
        echo "<pre>";
        var_dump(trim($_POST['productName'], "     "));
        // die;
        echo "</pre>";
        if (isset($_POST['them'])) {
            $errors = [];
            if (empty(trim($_POST['productName'], "     "))) {
                $errors[] = "Không được bỏ trống tên sản phẩm";
            }
            if (($_POST['categoryName'])) {
                $errors[] = "Không được bỏ trống danh mục";
            }
            if (empty($_POST['price']) || $_POST['price'] <= 0 || !is_numeric($_POST['price'])) {

                $errors[] = "Vui lòng điền số lớn hơn 0";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'add-product');
            } else {
                $result = $this->product->addProduct(Null, $_POST['productName'], $_POST['price'], $_POST['categoryName'], $_POST['status']);
                if ($result) {
                    redirect('success', "Thêm sản phẩm thành công", 'add-product');
                }
            }
        }
    }
    public function editProduct($id)
    {
        $data = $this->product->getDetailProduct($id);
        $cate = new Category();
        $cate = $cate->getCategory();
        return $this->render('product.edit', compact('data', 'cate'));
    }
    public function editProductPost($id)
    {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        if (isset($_POST['sua'])) {
            $errors = [];
            if (empty($_POST['productName'])) {
                $errors[] = "Không được bỏ trống tên sản phẩm";
            }
            if (empty($_POST['price']) || $_POST['price'] <= 0 || !is_numeric($_POST['price'])) {
                $errors[] = "Vui lòng điền số lớn hơn 0";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'edit-product/' . $id);
            } else {
                $result = $this->product->updateProduct($id, $_POST['productName'], (float)$_POST['price'], $_POST['categoryName'], $_POST['status']);
                if ($result) {
                    redirect('success', "Sửa sản phẩm thành công", 'product-list');
                }
            }
        }
    }
    public function deleteProduct($id)
    {
        $result = $this->product->deleteProduct($id);
        if ($result) {
            redirect('success', "Xóa sản phẩm thành công", 'product-list');
        }
    }
}
