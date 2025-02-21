<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AnnouncementController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home/Index');
})->name('home');

Route::get('/inquiry', [InquiryController::class, 'index'])->name('inquiry');
Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement');

Route::prefix('/admin/product')->group(function(){
    Route::inertia('/create', 'Admin/Product/Index')->name('admin.product.create');;
    Route::get('/manage', [ProductController::class, 'adminIndex'])->name('admin.product.manage');
    Route::post('/create', [ProductController::class, 'store'])->name('admin.product.store');
});

Route::prefix('/user/k-coin')->group(function(){
    Route::get('/manage', [CoinController::class, 'userManageIndex'])->name('user.coin.manage');
    Route::get('/use', [CoinController::class, 'userUseIndex'])->name('user.coin.use');
});

Route::prefix('/admin/k-coin')->group(function(){
    Route::get('/manage', [CoinController::class, 'adminManageIndex'])->name('admin.coin.manage');
});