<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\UserModel;

/**
* 
*/
class RegisterController extends Controller
{
    /**
    *
    */
    public function getSignUp($request, $response)
    {
        return $this->view->render($response, 'auth/signup.twig');
    }

    /**
    *
    */
    public function postSignUp($request, $response)
    {
        $request = $request->getParsedBody();

        $rules = [
            'required'      => [
                ['username'],
                ['email'],
                ['password'],
            ],
            
            'alphaNum'      => [
                ['username'],
            ],

            'email'         => [
                ['email'],
            ],

            'lengthMin'     => [
                ['username', 6],
                ['email', 10],
                ['password', 6],
            ],
        ];

        $this->validator->rules($rules);
        $this->validator->labels([
            'username'  => 'Username',
            'email'     => 'Email',
            'password'  => 'Password',
        ]);

        if ($this->validator->validate()) {
            $usernameCheck  = UserModel::where('username', $request['username'])->get();
            $emailCheck     = UserModel::where('email', $request['email'])->get();

            if (count($usernameCheck) === 0) {
                if (count($emailCheck) === 0) {
                    $user = new UserModel;
                    $user->username     = $request['username'];
                    $user->email        = $request['email'];
                    $user->password     = password_hash($request['password'], PASSWORD_DEFAULT);
                    $user->role_id      = 2;
                    $user->save();

                    echo "Sukses";
                } else {
                    echo "Email Use";
                }
            } else {
                echo "Username Use";
            }
        } else {
            $_SESSION['errors'] = $this->validator->errors();
            $_SESSION['old'] = $request;

            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }
    }
}