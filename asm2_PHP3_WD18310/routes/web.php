<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\Admin\TaiKhoanController;


//user
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\OrderController;






Route::get('/admin', function () {
    return view('admin.layout');
});
Route::get('/user', function () {
    return view('user.layout');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('danhmuc', [DanhMucController::class, 'index'])->name('danhmuc.index');
    
    Route::get('danhmuc/create', [DanhMucController::class, 'create'])->name('danhmuc.create');
    Route::post('danhmuc', [DanhMucController::class, 'store'])->name('danhmuc.store');
    Route::get('danhmuc/{danhMuc}/edit', [DanhMucController::class, 'edit'])->name('danhmuc.edit');
    Route::put('danhmuc/{danhMuc}', [DanhMucController::class, 'update'])->name('danhmuc.update');
    Route::delete('danhmuc/{danhMuc}', [DanhMucController::class, 'destroy'])->name('danhmuc.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('sanpham', [SanPhamController::class, 'index'])->name('admin.sanpham.index');
    Route::get('sanpham/create', [SanPhamController::class, 'create'])->name('admin.sanpham.create');
    Route::post('sanpham', [SanPhamController::class, 'store'])->name('admin.sanpham.store');  
    Route::get('sanpham/{id}/edit', [SanPhamController::class, 'edit'])->name('admin.sanpham.edit');
    Route::put('sanpham/{id}', [SanPhamController::class, 'update'])->name('admin.sanpham.update');
    Route::delete('sanpham/{id}', [SanPhamController::class, 'destroy'])->name('admin.sanpham.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('khuyenmai', [KhuyenMaiController::class, 'index'])->name('admin.khuyenmai.index');
    Route::get('khuyenmai/create', [KhuyenMaiController::class, 'create'])->name('admin.khuyenmai.create');
    Route::post('khuyenmai', [KhuyenMaiController::class, 'store'])->name('admin.khuyenmai.store');
    Route::get('khuyenmai/{khuyenMai}/edit', [KhuyenMaiController::class, 'edit'])->name('admin.khuyenmai.edit');
    Route::put('khuyenmai/{khuyenMai}', [KhuyenMaiController::class, 'update'])->name('admin.khuyenmai.update');
    Route::delete('khuyenmai/{khuyenMai}', [KhuyenMaiController::class, 'destroy'])->name('admin.khuyenmai.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('banners', [BannerController::class, 'index'])->name('admin.banners.index');
    Route::get('banners/create', [BannerController::class, 'create'])->name('admin.banners.create');
    Route::post('banners', [BannerController::class, 'store'])->name('admin.banners.store');
    Route::get('banners/{banner}/edit', [BannerController::class, 'edit'])->name('admin.banners.edit');
    Route::put('banners/{banner}', [BannerController::class, 'update'])->name('admin.banners.update');
    Route::delete('banners/{banner}', [BannerController::class, 'destroy'])->name('admin.banners.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('taikhoan', [TaiKhoanController::class, 'index'])->name('taikhoan.index');

    Route::get('taikhoan/create', [TaiKhoanController::class, 'create'])->name('taikhoan.create');
    Route::post('taikhoan', [TaiKhoanController::class, 'store'])->name('taikhoan.store');

    Route::get('taikhoan/{user}/edit', [TaiKhoanController::class, 'edit'])->name('taikhoan.edit');
    Route::put('taikhoan/{user}', [TaiKhoanController::class, 'update'])->name('taikhoan.update');

    Route::delete('taikhoan/{user}', [TaiKhoanController::class, 'destroy'])->name('taikhoan.destroy');
});

Route::get('/admin/bills', [BillController::class, 'index'])->name('admin.bills.index');

Route::get('/admin/bills/{id}', [BillController::class, 'show'])->name('admin.bills.show');
Route::get('admin/bills/{id}/edit', [BillController::class, 'edit'])->name('admin.bills.edit');
Route::post('admin/bills/{id}/update', [BillController::class, 'update'])->name('admin.bills.update');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/san-pham/{id}', [HomeController::class, 'show'])->name('san_pham.show');


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('verify/{id}', [AuthController::class, 'verify'])->name('verify');


Route::post('/add-to-cart/{productId}', [HomeController::class, 'addToCart'])->name('add.to.cart');

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');


Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');

