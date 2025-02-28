<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CoinRequestController;
use App\Http\Controllers\UserController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home/Index');
})->name('home');

Route::get('/login', function (){
    return Inertia::render('Auth/Login/Index');
})->name('login');

Route::prefix('/user/k-coin')->group(function(){
    Route::get('/', [CoinController::class, 'index'])->name('user.coin.index');
    Route::get('/manage', [CoinRequestController::class, 'userManageIndex'])->name('user.coin.manage.index'); 
    Route::get('/use', [CoinRequestController::class, 'userUseIndex'])->name('user.coin.use.index');  
    Route::post('/use', [CoinRequestController::class, 'store'])->name('user.coin.use.store');
    Route::put('/use/{id}', [CoinRequestController::class, 'update'])->name('user.coin.use.update');
});

Route::prefix('/user/profile')->group(function(){
    Route::get('/', [UserController::class, 'edit'])->name('user.profile.edit');
});

Route::prefix('/admin/k-coin')->group(function(){
    Route::get('/', [CoinRequestController::class, 'adminManageIndex'])->name('admin.coin.index');
    Route::get('/create', [CoinController::class, 'create'])->name('admin.coin.create');  
});

Route::prefix('/admin/product')->group(function(){
    Route::inertia('/create', 'Admin/Product/Create')->name('admin.product.create');
    Route::get('/', [ProductController::class, 'adminIndex'])->name('admin.product.index'); 
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/', [ProductController::class, 'store'])->name('admin.product.store'); 
    Route::put('/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
});

Route::prefix('/admin/announcement')->group(function(){
    Route::get('/create', [AnnouncementController::class, 'create'])->name('admin.announcement.create');
    Route::get('/{id}/edit', [AnnouncementController::class, 'edit'])->name('admin.announcement.edit');
    Route::post('/', [AnnouncementController::class, 'store'])->name('admin.announcement.store');
    Route::put('/{id}', [AnnouncementController::class, 'update'])->name('admin.announcement.update');
    Route::delete('/{id}', [AnnouncementController::class, 'destroy'])->name('admin.announcement.destroy');
});


Route::prefix('/admin/user')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/{id}', [UserController::class, 'show'])->name('admin.user.show');
    Route::put('/{id}', [UserController::class, 'update'])->name('admin.user.update');
});

Route::prefix('/admin/inquiry')->group(function(){
    Route::post('/{inquiry_id}/answer', [AnswerController::class, 'store'])->name('admin.inquiry.answer.store');
    Route::delete('/{inquiry_id}/answer/{id}', [AnswerController::class, 'destroy'])->name('admin.inquiry.answer.destroy');
    Route::put('/{inquiry_id}/answer/{id}', [AnswerController::class, 'update'])->name('admin.inquiry.answer.update');
});

Route::prefix('/inquiry')->group(function(){   
    Route::get('/', [InquiryController::class, 'index'])->name('inquiry.index');
    Route::get('/create', [InquiryController::class, 'create'])->name('inquiry.create');
    Route::get('/{id}/edit', [InquiryController::class, 'edit'])->name('inquiry.edit');
    Route::get('/{id}', [InquiryController::class, 'show'])->name('inquiry.show');
    Route::post('/', [InquiryController::class, 'store'])->name('inquiry.store');
    Route::put('/{id}', [InquiryController::class, 'update'])->name('inquiry.update'); 
    Route::delete('/{id}', [InquiryController::class, 'destroy'])->name('inquiry.destroy');
});

Route::prefix('/announcement')->group(function(){
    Route::get('/', [AnnouncementController::class, 'index'])->name('announcement.index');
    Route::get('/{id}', [AnnouncementController::class, 'show'])->name('announcement.show');
});

