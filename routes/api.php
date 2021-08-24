<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('baixar-produtos/${id}', 'ApiProductController@updateQuantity')->name('api.products.update.quantity');
Route::post('adicionar-produtos', 'ApiProductController@storeProduct')->name('api.products.store.product');
