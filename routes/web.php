<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::resource('products', 'ProductController');
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/update-iventory/{id}', 'ProductController@viewEditInventory')->name('iventory');
    Route::put('/update-iventory/{id}', 'ProductController@editInventory')->name('update.iventory');
});
Auth::routes();
