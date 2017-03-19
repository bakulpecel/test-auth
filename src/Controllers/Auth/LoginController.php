<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\UserModel;

/**
* 
*/
class LoginController extends Controller
{
    /**
    *
    */
    public function getSignIn($request, $response)
    {
        return $this->view->render($response, 'auth/signin.twig');
    }

    /**
    *
    */
    public function postSignIn($request, $response)
    {
        $request = $request->getParsedBody();

        $user = $this->auth->attempt($request['username'], $request['password']);

        if (!$user) {
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }

        return $response->withRedirect($this->router->pathFor('dashboard.home', ['username' => $_SESSION['user']['username']]));
    }
}