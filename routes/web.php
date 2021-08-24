<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::resource('products', 'ProductController');
Auth::routes();
