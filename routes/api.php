<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;

Route::middleware(["auth:sanctum"])->group(function(){
    Route::apiResource('/user', UserController::class);
    Route::apiResource('/product', ProductController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/myproducts', [CustomerController::class, 'customerProducts']);
    Route::post('/add-product/{id}', [CustomerController::class, 'addProduct']);
    Route::delete('/remove-product/{id}', [CustomerController::class, 'removeProduct']);
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);

