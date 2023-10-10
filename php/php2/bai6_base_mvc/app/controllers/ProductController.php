<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController extends BaseController
{
    public $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function index()
    {
        $title = "Đây là trang sản phẩm";
        $cate = $this->product->getProduct();
        $this->render('product.list', compact('title', 'cate'));
    }
    public function addProduct()
    {
        $this->render('product.add');
    }
    public function addProductPost()
    {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        if (isset($_POST['them'])) {
            $errors = [];
            if (empty($_POST['ten_sp'])) {
                $errors[] = "Không được bỏ trống tên sản phẩm";
            }
            if (empty($_POST['don_gia'])) {
                $errors[] = "Không được bỏ trống giá sản phẩm";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'add-product');
            } else {
                $result = $this->product->addProduct(Null, $_POST['ten_sp'], $_POST['don_gia']);
                if ($result) {
                    redirect('success', "Thêm sản phẩm thành công", 'add-product');
                }
            }
        }
    }
    public function editProduct($id)
    {
        $data = $this->product->getDetailProduct($id);
        return $this->render('product.edit', compact('data'));
    }
    public function editProductPost($id)
    {
        echo "<pre>";
        var_dump($_POST['don_gia']);

        echo "</pre>";
        if (isset($_POST['sua'])) {
            $errors = [];
            if (empty($_POST['ten_sp'])) {
                $errors[] = "Không được bỏ trống tên sản phẩm";
            }
            if (!isset($_POST['don_gia'])) {
                $errors[] = "Không được bỏ trống giá sản phẩm";
            }
            if (isset($_POST['don_gia']) && is_double($_POST['don_gia'])) {
                $errors[] = "Vui lòng điền số";
                //  elseif (is_float($_POST['don_gia']) && (float)$_POST['don_gia'] <= 0) {
                //     $errors[] = "Vui lòng điền số lớn hơn 0";
                // }
            }
            // if (is_float($_POST['don_gia']) != true) {
            //     $errors[] = "Vui lòng điền số";
            // }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'edit-product/' . $id);
            } else {
                $result = $this->product->updateProduct($id, $_POST['ten_sp'], (float)$_POST['don_gia']);
                if ($result) {
                    redirect('success', "Sửa sản phẩm thành công", 'test');
                }
            }
        }
    }
}
