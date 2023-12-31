<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Auth::routes(['register' => false]);

Route::get('product/{id}/gallery', [ProductController::class, 'gallery'])->name('product.gallery');

Route::resource('product', ProductController::class);

Route::resource('product-galleries', ProductGalleryController::class);

Route::get('transaction/{id}/set-status', [TransactionController::class, 'setStatus'])->name('transaction.status');

Route::resource('transaction', TransactionController::class);

