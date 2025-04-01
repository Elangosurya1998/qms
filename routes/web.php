<?php

use Illuminate\Support\Facades\Route;

define('FRONTEND_ROUTES_PATH', realpath(__DIR__) . DIRECTORY_SEPARATOR . 'subroutes' . DIRECTORY_SEPARATOR);

// Post routes
include_once(FRONTEND_ROUTES_PATH . 'post.php');

// Pages routes
include_once(FRONTEND_ROUTES_PATH . 'page.php');

Route::get('/', function () {
    return view('layouts.home');
});
