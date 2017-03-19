<?php

namespace App\Auth;

use App\Models\UserModel;

/**
* 
*/
class Auth
{
    /**
    * 
    */
    public function user()
    {

        return UserModel::find(@$_SESSION['user']);

    }

    /**
    * 
    */
    public function check()
    {

        return isset($_SESSION['user']);

    }

    /**
    * 
    */
    public function attempt($username, $password)
    {

        $user = UserModel::where('username', $username)->first();

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user->password)) {
            
            $_SESSION['user'] = $user;

            return true;
        }

        return false;
    }

    /**
    * 
    */
    public function logout()
    {

        unset($_SESSION['user']);

    }
}