<?php

$app->get('/', 'App\Controllers\HomeController:index')->setName('home');

// Auth
$app->get('/auth/signup', 'App\Controllers\Auth\RegisterController:getSignUp')->setName('auth.signup');
$app->post('/auth/signup', 'App\Controllers\Auth\RegisterController:postSignUp');

$app->get('/auth/signin', 'App\Controllers\Auth\LoginController:getSignin')->setName('auth.signin');
$app->post('/auth/signin', 'App\Controllers\Auth\LoginController:postSignin');

$app->get('/user/{username}', 'App\Controllers\BlogController:home')->setName('dashboard.home');