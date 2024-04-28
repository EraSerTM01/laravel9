<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api as Controllers;

Route::prefix('/auth')->name('auth.')->controller(Controllers\AuthController::class)->group(function () {

    Route::post('/register', 'register')->name('register');

    Route::post('/login', 'login')->name('login');

    Route::post('/logout', 'logout')->middleware('auth:sanctum')->name('logout');


});

Route::prefix('/users')->name('users.')->middleware('auth:sanctum')->controller(Controllers\UserController::class)->group(function () {

    Route::get('/me', 'getCurrentUser')->name('me');
});

Route::prefix('/categories')->name('categories.')->controller(Controllers\CategoryController::class)->group(function () {

    Route::get('/', 'index')->name('index');
});

Route::prefix('/products')->name('products.')->middleware('auth:sanctum')->controller(Controllers\ProductController::class)->group(function () {

    Route::get('/', 'index')->name('index');
});


