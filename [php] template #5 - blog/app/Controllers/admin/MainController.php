<?php

namespace App\Controllers\admin;

use App\Models\admin\Admin;
use App\Models\Comment;

/**
 * Class MainController
 * @package App\Controllers\admin
 */
class MainController extends AdminController
{
    public function indexAction()
    {
        header("Location: /");
        exit();
    }

    public function loginAction()
    {
        if(Admin::isAdmin()){
            header("Location: /");
            exit();
        }

        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        if($username && $password){
            $adminObject = new Admin();
            if($adminObject->loginAdmin($username, $password)){
                header("Location: /");
                unset($_SESSION['error']);
            }else{
                $_SESSION['error'] = 'failed';
            }
        }
    }

    public function menuAction()
    {
        $logout = $_GET['logout'] ?? -1;
        if($logout == 1){
            Admin::logoutAdmin();
            $this->layout = 'blog';
            header("Location: /");
            exit;
        }elseif($logout == 0){
            header("Location: /");
            exit;
        }
    }

    public function changepassAction()
    {
        $adminObject = new Admin();
        if($adminObject->verifyNewPass($_POST['password'])){
            $adminObject->changePasswordInDataBase($_POST['password']);
            header("Location: /admin/main/menu/?ch-pas-success=1");
            exit();
        }
        header("Location: /admin/main/menu/?ch-pas-success=0");
        exit();
    }
    
    public function approveAction()
    {
        if(isINT($_GET['id']))
        {
            $commentID = $_GET['id'];
            $commentObject = new Comment();
            $commentObject->approveComment($commentID);
        }
        header("Location: /admin/article/confirmcomments");
        exit();
    }
}