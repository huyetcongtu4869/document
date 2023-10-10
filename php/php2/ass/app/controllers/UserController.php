<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    public $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function userList()
    {
        $title = "Đây là trang người dùng";
        $user = $this->user->getUser();
        $this->render('user.list', compact('title', 'user'));
    }
    public function addUser()
    {
        $this->render('user.add');
    }
    public function addUserPost()
    {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        if (isset($_POST['them'])) {
            $errors = [];
            if (empty($_POST['userName'])) {
                $errors[] = "Không được bỏ trống tên người dùng";
            }

            if (count($errors) > 0) {
                redirect('errors', $errors, 'add-user');
            } else {
                $result = $this->user->addUser(Null, $_POST['userName']);
                if ($result) {
                    redirect('success', "Thêm người dùng thành công", 'add-user');
                }
            }
        }
    }
    public function editUser($id)
    {
        $data = $this->user->getDetailUser($id);
        return $this->render('user.edit', compact('data'));
    }
    public function editUserPost($id)
    {
        echo "<pre>";
        echo "</pre>";
        if (isset($_POST['sua'])) {
            $errors = [];
            if (empty($_POST['userName'])) {
                $errors[] = "Không được bỏ trống tên người dùng";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'edit-user/' . $id);
            } else {
                $result = $this->user->updateUser($id, $_POST['userName']);
                if ($result) {
                    redirect('success', "Sửa sản phẩm thành công", 'user-list');
                }
            }
        }
    }
    public function deleteUser($id)
    {
        $result = $this->user->deleteUser($id);
        if ($result) {
            redirect('success', "Xóa người dùng thành công", 'user-list');
        }
    }
}
