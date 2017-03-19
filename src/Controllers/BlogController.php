<?php

namespace App\Controllers;

/**
* 
*/
class BlogController extends Controller
{
    /**
    * 
    */
    public function home($request, $response)
    {
        return $this->view->render($response, 'templates/blog.twig');
    }
}