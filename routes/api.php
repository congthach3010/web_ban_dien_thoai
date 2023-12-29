<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\ChiTietDonHangController;
use App\Http\Controllers\ChiTietNhapKhoController;
use App\Http\Controllers\ChuyenMucController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\HoaDonNhapKhoController;
use App\Http\Controllers\QuyenController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ThongKeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/admin-shop/login', [\App\Http\Controllers\AdminController::class, 'actionLogin']);
// Route::group(['prefix' => '/admin-shop' , 'middleware' => 'AdminMiddleware'], function () {
    Route::get('/', [TestController::class, 'index']);
    Route::group(['prefix' => 'danh-muc'], function () {
        Route::get('/index', [DanhMucController::class, 'index']);
        Route::post('/create', [DanhMucController::class, 'store']);
        Route::get('/data', [DanhMucController::class, 'getData']);
        Route::get('/edit/{id}', [DanhMucController::class, 'edit']);
        Route::post('/update', [DanhMucController::class, 'update']);
        Route::get('/destroy/{id}', [DanhMucController::class, 'destroy']);
        Route::get('/update-status/{id}', [DanhMucController::class, 'updateStatus']);
        Route::post('/check-category-id',[DanhMucController::class,'checkCategoryId']);
        Route::post('/check-category-id2',[DanhMucController::class,'checkCategoryId2']);
        // Route::post('/search', [DanhMucController::class, 'search']);

    });

    Route::group(['prefix' => 'san-pham'], function () {
        Route::get('/index', [SanPhamController::class, 'index']);
        Route::get('/', [SanPhamController::class, 'index_vue']);
        Route::post('/create', [SanPhamController::class, 'store']);
        Route::get('/data', [SanPhamController::class, 'getData']);
        Route::get('/edit/{id}', [SanPhamController::class, 'edit']);
        Route::post('/update', [SanPhamController::class, 'update']);
        Route::get('/destroy/{id}', [SanPhamController::class, 'destroy']);
        Route::get('/update-status/{id}', [SanPhamController::class, 'updateStatus']);
        Route::post('/check-product-id', [SanPhamController::class, 'checkProductId']);
        Route::post('/check-product-id2', [SanPhamController::class, 'checkProductId2']);
        Route::post('/check-product-slug', [SanPhamController::class, 'checkProductSlug']);
        Route::post('/search', [SanPhamController::class, 'search']);


    });
    Route::group(['prefix' => 'chuyen-muc'], function () {
        Route::get('/index', [ChuyenMucController::class, 'index']);
        Route::post('/create', [ChuyenMucController::class, 'store']);
        Route::post('/check-chuyenmuc-id', [ChuyenMucController::class, 'checkChuyenMuc']);
        Route::get('/data', [ChuyenMucController::class, 'getData']);
        Route::get('/update-status/{id}', [ChuyenMucController::class, 'updateStatus']);
        Route::post('/update', [ChuyenMucController::class, 'update']);
        Route::get('/edit/{id}', [ChuyenMucController::class, 'edit']);
        Route::get('/destroy/{id}', [ChuyenMucController::class, 'destroy']);

    });

    Route::group(['prefix' => 'bai-viet'], function(){
        Route::get('/index', [BaiVietController::class, 'index']);
        Route::post('/create', [BaiVietController::class, 'store']);
        Route::get('/data', [BaiVietController::class, 'getData']);
        Route::post('/update', [BaiVietController::class, 'update']);
        Route::get('/edit/{id}', [BaiVietController::class, 'edit']);
        Route::get('/destroy/{id}', [BaiVietController::class, 'destroy']);
    });
    Route::group(['prefix' => '/nhap-kho'], function() {
        Route::get('/', [ChiTietNhapKhoController::class, 'index']);
        Route::get('/data', [ChiTietNhapKhoController::class, 'getData']);

        Route::post('/create', [ChiTietNhapKhoController::class, 'store']);
        Route::post('/delete', [ChiTietNhapKhoController::class, 'destroy']);
        Route::post('/update', [ChiTietNhapKhoController::class, 'update']);
        Route::post('/create-nhap-kho', [ChiTietNhapKhoController::class, 'createNhapKho']);
        Route::post('/create-nhap-kho-chinh-thuc', [ChiTietNhapKhoController::class, 'createNhapKhoChinhThuc'])->name('NhapKhoChinhThuc');

        Route::get('/lich-su', [HoaDonNhapKhoController::class, 'history']);
    });
    Route::group(['prefix' => '/hoa-don-nhap-kho'], function() {
        Route::get('/', [HoaDonNhapKhoController::class, 'index']);
        Route::get('/data', [HoaDonNhapKhoController::class, 'getData'])->name('DataHoaDonNhapKho');
        Route::get('/data-nhap-kho/{id}', [HoaDonNhapKhoController::class, 'dataNhapKho'])->name('dataNhapKho');
        Route::post('/change-type', [HoaDonNhapKhoController::class, 'changeType']);
        Route::post('/search', [HoaDonNhapKhoController::class, 'search']);

        Route::get('/thong-ke', [HoaDonNhapKhoController::class, 'analytic']);
        Route::post('/thong-ke', [HoaDonNhapKhoController::class, 'analyticPost'])->name('postThongKeNhapKho');
        Route::get('/thong-ke-san-pham', [ThongKeController::class, 'index1']);
        Route::post('/thong-ke-san-pham', [ThongKeController::class, 'search1'])->name('postThongKeNhapKhoSanPham');
    });
    Route::group(['prefix' => '/admin'], function () {
        Route::get('/index', [AdminController::class, 'index']);
        Route::get('/data', [AdminController::class, 'getData']);
        Route::post('/check-email',[AdminController::class,'checkEmail']);
        Route::post('/create',[AdminController::class,'store']);
        Route::get('/update-status/{id}', [AdminController::class, 'updateStatus']);
        Route::get('/logout', [AdminController::class, 'logout']);
        Route::post('/update', [AdminController::class, 'update']);
        Route::post('/update-password', [AdminController::class, 'updatePassword']);
        Route::get('/edit/{id}', [AdminController::class, 'edit']);
        Route::get('/destroy/{id}', [AdminController::class, 'destroy']);

    });
    Route::group(['prefix' => '/hoa-don-ban-hang'], function() {
        Route::get('/index', [HoaDonController::class, 'admin_index']);

        Route::get('/data', [HoaDonController::class, 'getData']);
        Route::get('/exportPdf/{id}', [HoaDonController::class, 'exportPdf']);

        Route::post('/change-status', [HoaDonController::class, 'changeStatus']);
        Route::post('/change-type', [HoaDonController::class, 'changeType']);
        Route::post('/search', [HoaDonController::class, 'search']);
        Route::get('/detail/{id}', [ChiTietDonHangController::class, 'getDetail']);

        Route::get('/thong-ke', [HoaDonController::class, 'analytic']);
        Route::post('/thong-ke', [HoaDonController::class, 'analyticPost'])->name('postThongKe');
        Route::get('/thong-ke-san-pham', [ThongKeController::class, 'index']);
        Route::post('/thong-ke-san-pham', [ThongKeController::class, 'search'])->name('postThongKeSanPham');


    });

    Route::group(['prefix' => '/slide'], function() {
        Route::get('/index', [SlideController::class, 'index']);
        Route::post('/create', [SlideController::class, 'store']);
        Route::get('/data', [SlideController::class, 'getData']);
        Route::get('/edit/{id}', [SlideController::class, 'edit']);
        Route::post('/update', [SlideController::class, 'update']);
        Route::get('/destroy/{id}', [SlideController::class, 'destroy']);
        Route::get('/update-status/{id}', [SlideController::class, 'updateStatus']);

    });
    Route::group(['prefix' => '/quyen'], function() {
        Route::get('/', [QuyenController::class, 'index']);
        Route::get('/data', [QuyenController::class, 'getData']);
        Route::get('/data-action', [QuyenController::class, 'getAction']);

        Route::post('/create', [QuyenController::class, 'store']);
        Route::post('/delete', [QuyenController::class, 'destroy']);
        Route::post('/update', [QuyenController::class, 'update']);
        Route::post('/update-action', [QuyenController::class, 'updateAction']);
        Route::get('/update-status/{id}', [QuyenController::class, 'updateStatus']);

    });
    Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'logout']);
// });
