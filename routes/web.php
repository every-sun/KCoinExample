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

Route::prefix('/admin/product')->group(function(){
    Route::inertia('/create', 'Admin/Product/Create')->name('admin.product.create');
    Route::get('/', [ProductController::class, 'adminIndex'])->name('admin.product.index'); 
    Route::post('/', [ProductController::class, 'store'])->name('admin.product.store'); 
});

Route::prefix('/user/k-coin')->group(function(){
    Route::get('/manage', [CoinController::class, 'userManageIndex'])->name('user.coin.manage.index'); 
    Route::get('/use', [CoinController::class, 'userUseIndex'])->name('user.coin.use.index'); 
});

Route::prefix('/admin/k-coin')->group(function(){
    Route::get('/', [CoinController::class, 'adminManageIndex'])->name('admin.coin.index'); 
});

Route::prefix('/admin/announcement')->group(function(){
    Route::get('/create', [AnnouncementController::class, 'create'])->name('admin.announcement.create');
    Route::get('/{id}/edit', [AnnouncementController::class, 'edit'])->name('admin.announcement.edit');
    Route::post('/', [AnnouncementController::class, 'store'])->name('admin.announcement.store');
    Route::put('/{id}', [AnnouncementController::class, 'update'])->name('admin.announcement.update');
    Route::delete('/{id}', [AnnouncementController::class, 'destroy'])->name('admin.announcement.destroy');
});

Route::get('/inquiry', [InquiryController::class, 'index'])->name('inquiry.index');

Route::prefix('/announcement')->group(function(){
    Route::get('/', [AnnouncementController::class, 'index'])->name('announcement.index');
    Route::get('/{id}', [AnnouncementController::class, 'show'])->name('announcement.show');
});
