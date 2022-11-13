<?php

use App\Http\Controllers\Admin\AksesJurnalController;
use App\Http\Controllers\Admin\BookingAdminController;
use App\Http\Controllers\Admin\CatalogAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonasiAdminController;
use App\Http\Controllers\Admin\GalleryAdminController;
use App\Http\Controllers\Admin\InformationAdminController;
use App\Http\Controllers\Admin\JenisAnggotaController;
use App\Http\Controllers\Admin\JenisBukuController;
use App\Http\Controllers\Admin\NewsAdminController;
use App\Http\Controllers\Admin\SirkulasiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Anggota\CatalogController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Component\DropDownController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);

Route::resource('register', RegisterController::class );

Route::get('getInstitusi/{id}', [DropDownController::class, 'getInstitusi']);

Route::get('getJenisAnggota/{id}', [DropDownController::class, 'getJenisAnggota']);

Route::middleware(['auth'])->group(function () {
    Route::get('getJenisBuku/{id}', [DropDownController::class, 'getJenisBuku']);

     // For Admin
    Route::middleware(['is_admin'])->group(function () {
        Route::resource('admin/dashboard-admin', DashboardController::class);
        Route::resource('admin/catalog-admin', CatalogAdminController::class);
        Route::resource('admin/user-admin', UserController::class);
        Route::resource('admin/booking-admin', BookingAdminController::class);
        Route::resource('admin/donasi-admin', DonasiAdminController::class);
        Route::resource('admin/news-admin', NewsAdminController::class);
        Route::resource('admin/information-admin', InformationAdminController::class);
        Route::resource('admin/gallery-admin', GalleryAdminController::class);
        Route::resource('admin/jenis-keanggotaan', JenisAnggotaController::class);
        Route::resource('admin/jenis-buku', JenisBukuController::class);
        Route::resource('admin/sirkulasi', SirkulasiController::class);
        Route::resource('admin/akses-jurnal', AksesJurnalController::class);
    });

    // For Consumen
    Route::middleware(['is_anggota'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('/catalog', CatalogController::class);
    });
});
