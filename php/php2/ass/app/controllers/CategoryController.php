<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController extends BaseController
{
    public $category;
    // public function __construct()
    // {
    //     $this->category = new Category();
    // }

    public function categoryList()
    {
        $title = "Đây là trang danh mục";
        $category = $this->category->getCategory();
        $this->render('category.list', compact('title', 'category'));
    }
    public function addCategory()
    {
        $this->render('category.add');
    }
    public function addCategoryPost()
    {

        if (isset($_POST['them'])) {
            $errors = [];
            if (empty($_POST['categoryName'])) {
                $errors[] = "Không được bỏ trống tên danh mục";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'add-category');
            } else {
                $result = $this->category->addCategory(Null, $_POST['categoryName'], $_POST['status']);
                if ($result) {
                    redirect('success', "Thêm danh mục thành công", 'add-category');
                }
            }
        }
    }
    public function editCategory($id)
    {
        $data = $this->category->getDetailCategory($id);
        return $this->render('category.edit', compact('data'));
    }
    public function editCategoryPost($id)
    {

        if (isset($_POST['sua'])) {
            $errors = [];
            if (empty($_POST['categoryName'])) {
                $errors[] = "Không được bỏ trống tên sản phẩm";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'edit-category' . $id);
            } else {
                $result = $this->category->updateCategory($id, $_POST['categoryName']);
                if ($result) {
                    redirect('success', "Sửa sản phẩm thành công", 'category-list');
                }
            }
        }
    }
    public function deleteCategory($id)
    {
        $result = $this->category->deleteCategory($id);
        if ($result) {
            redirect('success', "Xóa sản phẩm thành công", 'category-list');
        }
    }
}
