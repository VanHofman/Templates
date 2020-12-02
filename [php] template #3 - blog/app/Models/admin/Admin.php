<?php

namespace App\Models\admin;

/**
 * Class Admin
 * @package App\Models\admin
 */
class Admin
{
    /**
     * @return bool
     */
    public static function isAdmin(){
        return (isset($_SESSION['user']) && $_SESSION['role'] == 1);
    }

    public static function logoutAdmin(){
        unset($_SESSION['user']);
        unset($_SESSION['role']);
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function loginAdmin($username, $password){
        $user = \R::findOne('users', "WHERE username = ? AND role= 1", [$username]);
        if($user) {
            if(password_verify($password, $user['password'])){
                $_SESSION['user'] = $user['username'];
                $_SESSION['role'] = 1;
                return true;
            }
        }
        return false;
    }

    /**
     * @param $password
     * @return bool
     */
    public function verifyNewPass($password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            return false;
        }
        return true;
    }

    /**
     * @param $password
     */
    public function changePasswordInDataBase($password)
    {
        $newPassword = password_hash($password, PASSWORD_DEFAULT);
        \R::exec('UPDATE users SET password = ? WHERE username = ? ', [$newPassword, $_SESSION['user']]);
    }
}