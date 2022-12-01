<?php

use App\Http\Controllers\Admin\AksesJurnalController;
use App\Http\Controllers\Admin\AkuisisiBukuController;
use App\Http\Controllers\Admin\BookingAdminController;
use App\Http\Controllers\Admin\CatalogAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonasiAdminController;
use App\Http\Controllers\Admin\GalleryAdminController;
use App\Http\Controllers\Admin\InformationAdminController;
use App\Http\Controllers\Admin\JenisAnggotaController;
use App\Http\Controllers\Admin\JenisBukuController;
use App\Http\Controllers\Admin\KoleksiBukuController;
use App\Http\Controllers\Admin\NewsAdminController;
use App\Http\Controllers\Admin\SirkulasiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Anggota\CatalogController;
use App\Http\Controllers\Anggota\HistoryController;
use App\Http\Controllers\Anggota\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Component\DropDownController;
use App\Http\Controllers\Component\SearchController;
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
    return redirect()->route('home');
});

Route::get('/home', [App\Http\Controllers\AnggotaController::class, 'index'])->name('home');

Route::get('/catalog', [App\Http\Controllers\AnggotaController::class, 'catalog'])->name('catalog');

Route::get('/catalog/{kodebuku}', [App\Http\Controllers\AnggotaController::class, 'detail_buku'])->name('catalog.detail');

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
        Route::resource('admin/akuisisi-buku', AkuisisiBukuController::class);
        Route::resource('buku/koleksi-buku', KoleksiBukuController::class);
        Route::resource('buku/catalog-admin', CatalogAdminController::class);
        Route::resource('user/user-admin', UserController::class);
        Route::resource('admin/booking-admin', BookingAdminController::class);
        Route::resource('admin/donasi-admin', DonasiAdminController::class);
        Route::resource('admin/news-admin', NewsAdminController::class);
        Route::resource('admin/information-admin', InformationAdminController::class);
        Route::resource('admin/gallery-admin', GalleryAdminController::class);
        Route::resource('user/jenis-keanggotaan', JenisAnggotaController::class);
        Route::resource('buku/jenis-buku', JenisBukuController::class);
        Route::resource('buku/sirkulasi', SirkulasiController::class);
        Route::resource('admin/akses-jurnal', AksesJurnalController::class);
        Route::match(['put', 'patch'],'admin/booking-admin/{booking_admin}', [App\Http\Controllers\Component\CheckController::class, 'selesai'])->name('booking-admin.selesai');
        Route::get('getUser/{id}', [DropDownController::class, 'getUser']);
        Route::get('getAnggota/{id}', [DropDownController::class, 'getAnggota']);
        Route::get('getBuku/{id}', [DropDownController::class, 'getBuku']);
        Route::get('getKodeBuku/{kode}', [SearchController::class, 'getKodeBuku']);
    });

    // For Consumen
    Route::middleware(['is_anggota'])->group(function () {
        Route::match(['put', 'patch'],'catalog/{booking_anggota}', [App\Http\Controllers\Component\CheckController::class, 'pinjam'])->name('booking-anggota.pinjam');
        Route::resource('history', HistoryController::class);

        // Route::resource('/catalog', CatalogController::class);
    });
});
