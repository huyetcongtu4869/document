<?php

namespace App\Controllers;

use App\Models\Service;

class ServiceController extends BaseController
{
    public $service;
    public function __construct()
    {
        $this->service = new Service();
    }
    public function serviceList()
    {
        $title = "Đây là trang sản phẩm";
        $service = $this->service->getService();
        $this->render('service.list', compact('title', 'service'));
    }
    public function addService()
    {
        $this->render('service.add');
    }
    public function addServicePost()
    {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        if (isset($_POST['them'])) {
            $errors = [];
            if (empty($_POST['serviceName'])) {
                $errors[] = "Không được bỏ trống tên sản phẩm";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'add-service');
            } else {
                $result = $this->service->addService(Null, $_POST['serviceName']);
                if ($result) {
                    redirect('success', "Thêm sản phẩm thành công", 'add-service');
                }
            }
        }
    }
    public function editService($id)
    {
        $data = $this->service->getDetailService($id);
        return $this->render('service.edit', compact('data'));
    }
    public function editServicePost($id)
    {
        echo "<pre>";
        echo "</pre>";
        if (isset($_POST['sua'])) {
            $errors = [];
            if (empty($_POST['serviceName'])) {
                $errors[] = "Không được bỏ trống tên sản phẩm";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'edit-service/' . $id);
            } else {
                $result = $this->service->updateService($id, $_POST['serviceName']);
                if ($result) {
                    redirect('success', "Sửa sản phẩm thành công", 'add-service');
                }
            }
        }
    }
    // public function deleteService($id)
    // {
    //     $result = $this->service->deleteService($id);
    //     if ($result) {
    //         redirect('success', "Xóa sản phẩm thành công", 'product-list');
    //     }
    // }
}
