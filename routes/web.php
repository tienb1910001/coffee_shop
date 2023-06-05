<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    // products
    Route::get('/',             [AdminController::class, 'getIndex']);
    Route::get('/product/{id}',   [AdminController::class, 'getProduct']);
    Route::get('/productadd',   [AdminController::class, 'addProduct']);
    Route::post('/productadd',   [AdminController::class, 'postProduct']);
    Route::get('/product/update/{id}',     [AdminController::class, 'getUpdate']);
    Route::post('/product/update/{id}',     [AdminController::class, 'postUpdate']);
    Route::get('/product/delete/{id}',     [AdminController::class, 'getDelete']);
    // user
    Route::get('/user',         [AdminController::class, 'getUser']);
    Route::get('/user/{id}',     [AdminController::class, 'getInfoUser']);
    Route::get('/user/update/{id}',     [AdminController::class, 'getUpdateUs']);
    Route::post('/user/update/{id}',     [AdminController::class, 'postUpdateUs']);
    Route::get('/user/delete/{id}',     [AdminController::class, 'getDeleteUs']);
    // type
    Route::get('/type',         [AdminController::class, 'getType']);
    Route::get('/type/add',         [AdminController::class, 'addType']);
    Route::post('/type/add',         [AdminController::class, 'postAddType']);
    Route::get('/type/update/{id}',         [AdminController::class, 'updateType']);
    Route::post('/type/update/{id}',         [AdminController::class, 'postUpdateType']);
    Route::get('/type/delete/{id}',     [AdminController::class, 'getDeleteType']);

    Route::get('/bill',     [AdminController::class, 'getBill']);
    Route::get('/bill/delete/{id}',     [AdminController::class, 'getDeleteBill']);
});


Route::prefix('page')->group(function () {
    Route::get('/',                 [PageController::class, 'getIndex']);
    Route::get('/all-product',      [PageController::class, 'getAllProduct']);
    Route::get('/product/{id}',     [PageController::class, 'getProduct']);
    Route::get('/contact',          [PageController::class, 'getContact']);
    Route::get('/about',            [PageController::class, 'getAbout']);
    Route::get('/addCart/{id}',     [PageController::class, 'getAddCart']);
    Route::get('/deleteCart/{id}',  [PageController::class, 'getDeleteCart']);
    Route::get('/checkout',         [PageController::class, 'getCheckout']);
    Route::post('/checkout',        [PageController::class, 'postCheckout']);
    Route::get('/login',            [PageController::class, 'getLogin']);
    Route::post('/login',           [PageController::class, 'postLogin']);
    Route::get('/signup',           [PageController::class, 'getSignup']);
    Route::post('/signup',          [PageController::class, 'postSignup']);
    Route::get('/logout',          [PageController::class, 'getLogout']);
    Route::get('/info/{id}',          [PageController::class, 'getInfoUser']);
    Route::post('/info/{id}',          [PageController::class, 'postInfoUser']);
});
