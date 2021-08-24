<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/products', 301);
Route::resource('products', 'ProductController');
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/update-iventory/{id}', 'ProductController@viewEditInventory')->name('iventory');
    Route::put('/update-iventory/{id}', 'ProductController@editInventory')->name('update.iventory');
});
Route::get('/report', 'ReportController@index')->name('report.index');
Auth::routes(['register' => false]);
