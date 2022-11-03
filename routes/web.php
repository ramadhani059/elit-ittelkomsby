<?php

use App\Http\Controllers\Admin\AksesJurnalController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonasiController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\JenisAnggotaController;
use App\Http\Controllers\Admin\JenisBukuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SirkulasiController;
use App\Http\Controllers\Admin\UserController;
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
     // For Admin
    Route::middleware(['is_admin'])->group(function () {
        Route::resource('dashboard', DashboardController::class);
        Route::resource('dashboard/catalog', CatalogController::class);
        Route::resource('dashboard/user', UserController::class);
        Route::resource('dashboard/booking', BookingController::class);
        Route::resource('dashboard/donasi', DonasiController::class);
        Route::resource('dashboard/news', NewsController::class);
        Route::resource('dashboard/information', InformationController::class);
        Route::resource('dashboard/gallery', GalleryController::class);
        Route::resource('dashboard/jenis-keanggotaan', JenisAnggotaController::class);
        Route::resource('dashboard/jenis-buku', JenisBukuController::class);
        Route::resource('dashboard/sirkulasi', SirkulasiController::class);
        Route::resource('dashboard/akses-jurnal', AksesJurnalController::class);
    });

    // For Consumen
    Route::middleware(['is_anggota'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });
});
