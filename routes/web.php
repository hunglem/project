<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use App\Http\kennel;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index'); 
});

Route::middleware(['auth',AuthAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index'); 
});

Route::get('/dashboard', function () {
    return view('layouts.userpage'); // Corrected to remove '.blade.php'
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';    

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->middleware(['auth'])->name('admin.profile');


Route::resource('products', ProductController::class);
Route::resource('product-categories', ProductCategoryController::class);
Route::resource('product-brands', ProductBrandController::class);
Route::resource('product-details', ProductDetailController::class);
Route::resource('orders', OrderController::class);
Route::resource('order-details', OrderDetailController::class);
Route::resource('payments', PaymentController::class);

Route::fallback(function () {
    return redirect()->route('home.index');
});

