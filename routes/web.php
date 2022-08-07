<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


Route::get('dashboard', [ProductController::class, 'index'])->name('dashboard');

//product
Route::get('add-product', [ProductController::class, 'create']);
Route::post('add-product', [ProductController::class, 'store'])->name('products.add-product');

Route::get('edit-product/{id}', [ProductController::class, 'edit']);
Route::post('edit-product/{id}', [ProductController::class, 'update'])->name('products.edit-product');
Route::get('show-product/{id}', [ProductController::class, 'show']);
Route::delete('delete-product/{id}', [ProductController::class, 'destroy'])->name('products.delete-product');

//category
Route::get('add-category', [CategoryController::class, 'create']);
Route::post('add-category', [CategoryController::class, 'store'])->name('category.add-category');

