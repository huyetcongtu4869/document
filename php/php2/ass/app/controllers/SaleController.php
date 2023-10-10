<?php

namespace App\Controllers;

use App\Models\Sale;

class SaleController extends BaseController
{
    public $sale;
    public function __construct()
    {
        $this->sale = new Sale();
    }
    public function saleList()
    {
        $title = "Đây là trang nhân viên";
        $sale = $this->sale->getSale();
        $this->render('sale.list', compact('title', 'sale'));
    }
    public function addSale()
    {
        $this->render('sale.add');
    }
    public function addSalePost()
    {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        if (isset($_POST['them'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors[] = "Không được bỏ trống tên sản phẩm";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'add-sale');
            } else {
                $result = $this->sale->addSale(Null, $_POST['name'], 1, 0);
                if ($result) {
                    redirect('success', "Thêm sản phẩm thành công", 'add-sale');
                }
            }
        }
    }
    public function editSale($id)
    {
        $data = $this->sale->getDetailSale($id);
        return $this->render('sale.edit', compact('data'));
    }
    public function editSalePost($id)
    {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        if (isset($_POST['sua'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors[] = "Không được bỏ trống tên sản phẩm";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'edit-sale/' . $id);
            } else {
                $result = $this->sale->updateSale($id, $_POST['name'], 1, 0);
                if ($result) {
                    redirect('success', "Sửa sản phẩm thành công", 'edit-sale/' . $id);
                }
            }
        }
    }
    public function deleteSale($id)
    {
        $result = $this->sale->deleteSale($id);
        if ($result) {
            redirect('success', "Xóa sản phẩm thành công", 'sale-list');
        }
    }
}
