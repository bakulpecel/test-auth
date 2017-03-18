<?php

namespace App\Controllers;

use Core\Controller;

/**
* 
*/
class HomeController extends Controller
{
    /**
    * Sample handler
    */
    public function index($request, $response)
    {
        return $this->view->render($response, 'home.twig');
    }
}