<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('baixar-produtos', 'ApiProductsController@updateQuantity')->name('api.products.update.quantity');
Route::post('adicionar-produtos', 'ApiProductsController@storeProduct')->name('api.products.store.product');
