<?php

use App\Http\Controllers\Admin\AccountController;
use Illuminate\Support\Facades\Response;
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
use App\Http\Controllers\Anggota\DonasiController;
use App\Http\Controllers\Anggota\HistoryController;
use App\Http\Controllers\Anggota\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Component\DropDownController;
use App\Http\Controllers\Component\FilePdfController;
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
Route::get('/catalog/{slug}', [App\Http\Controllers\AnggotaController::class, 'detail_buku'])->name('catalog.detail');
Route::get('/catalog/main/cari/',  [SearchController::class, 'searchCatalog'])->name('search.catalog');
Route::get('/catalog/main/filter/',  [SearchController::class, 'filterCatalog'])->name('filter.catalog');
Route::get('/informasi-penting/{slug}',  [App\Http\Controllers\AnggotaController::class, 'detailinformasi'])->name('detailinformasi');

Route::get('/tentangkami', function() {
    $pageTitle = 'Tentang Kami | ELIT ITTelkom Surabaya';
    return view('anggota.aboutus', compact('pageTitle'));
})->name('aboutus');

Auth::routes([
    'register' => false
]);

Route::resource('register', RegisterController::class );

Route::get('getInstitusi/{id}', [DropDownController::class, 'getInstitusi']);
Route::get('getJenisAnggota/{id}', [DropDownController::class, 'getJenisAnggota']);
Route::get('getFakultas/', [DropDownController::class, 'getFakultas']);
Route::get('getProdi/', [DropDownController::class, 'getProdi']);



Route::middleware(['auth'])->group(function () {
    Route::get('getJenisBuku/', [DropDownController::class, 'getJenisBuku']);
    Route::get('getPengarang/', [DropDownController::class, 'getPengarang']);
    Route::get('pdf/{id}/{originalname}', [FilePdfController::class, 'getPdfViews'])->name('pdf');
    Route::get('ijazah/{id}/{originalname}', [FilePdfController::class, 'getPdfIjazah'])->name('ijazahpdf');
    Route::get('download/{filename}', [FilePdfController::class, 'downloadFile'])->name('download');
    Route::get('pdfDonasi/{id}/{originalname}', [FilePdfController::class, 'getPdfViewsDonasi'])->name('pdfDonasi');
    Route::get('fileSerahTerima/{id}',[FilePdfController::class, 'fileSerahTerima'])->name('BASerahTerima');

    // My Profile
    Route::get('myanggotaprofile', [App\Http\Controllers\Anggota\AccountController::class, 'myanggotaprofile'])->name('myprofileanggota');
    Route::get('editmyanggotaprofile', [App\Http\Controllers\Anggota\AccountController::class, 'editmyanggotaprofile'])->name('editmyanggotaprofile');
    Route::match(['put', 'patch'],'deleteanggotaaccount/{id}', [App\Http\Controllers\Anggota\AccountController::class, 'nonactiveanggotaaccount'])->name('nonactiveanggotaaccount');
    Route::match(['put', 'patch'],'editmyanggotaprofile/{id}', [App\Http\Controllers\Anggota\AccountController::class, 'updatemyanggotaprofile'])->name('updatemyanggotaprofile');

    // Notifikasi
    // Route::get('/notifikasi', function() {
    //     $pageTitle = 'Notifikasi | ELIT ITTelkom Surabaya';
    //     return view('anggota.notifikasi.index', compact('pageTitle'));
    // })->name('notifikasi');

    // Route::get('/detailnotifikasi', function() {
    //     $pageTitle = 'Detail Notifikasi | ELIT ITTelkom Surabaya';
    //     return view('anggota.notifikasi.detailnotifikasi', compact('pageTitle'));
    // })->name('detailnotifikasi');

     // For Admin
    Route::middleware(['is_admin'])->group(function () {
        Route::resource('admin/dashboard-admin', DashboardController::class);
        Route::resource('admin/akuisisi-buku', AkuisisiBukuController::class);
        Route::resource('buku/koleksi-buku', KoleksiBukuController::class);
        Route::resource('buku/catalog-admin', CatalogAdminController::class);
        Route::resource('user/user-admin', UserController::class);
        Route::match(['put', 'patch'],'user/deactivate-user/{user_admin}', [App\Http\Controllers\Admin\UserController::class, 'deactivateuser'])->name('user-admin.deactivate');
        Route::match(['put', 'patch'],'user/activate-user/{user_admin}', [App\Http\Controllers\Admin\UserController::class, 'activateuser'])->name('user-admin.activate');
        Route::match(['put', 'patch'],'user/accept-verif/{user_admin}', [App\Http\Controllers\Admin\UserController::class, 'updateaccept'])->name('user-admin.updateaccept');
        Route::match(['put', 'patch'],'user/decline-verif/{user_admin}', [App\Http\Controllers\Admin\UserController::class, 'updatedecline'])->name('user-admin.updatedecline');
        Route::resource('admin/booking-admin', BookingAdminController::class);
        Route::resource('admin/donasi-admin', DonasiAdminController::class);
        Route::get('admin/donasi-admin/check/{donasi_admin}', [App\Http\Controllers\Admin\DonasiAdminController::class, 'check'])->name('donasi-admin.check');
        Route::resource('admin/information-admin', InformationAdminController::class);
        Route::resource('user/jenis-keanggotaan', JenisAnggotaController::class);
        Route::resource('buku/jenis-buku', JenisBukuController::class);
        Route::resource('buku/sirkulasi', SirkulasiController::class);
        Route::resource('admin/akses-jurnal', AksesJurnalController::class);
        Route::match(['put', 'patch'],'admin/booking-admin/selesai/{booking_admin}', [App\Http\Controllers\Component\CheckController::class, 'selesai'])->name('booking-admin.selesai');
        Route::match(['put', 'patch'],'admin/booking-admin/{booking_admin}', [App\Http\Controllers\Component\CheckController::class, 'disetujui'])->name('booking-admin.disetujui');
        Route::get('getUser/{id}', [DropDownController::class, 'getUser']);
        Route::get('getAnggota/{id}', [DropDownController::class, 'getAnggota']);
        Route::get('getBuku/{id}', [DropDownController::class, 'getBuku']);
        Route::get('getKodeBuku/{kode}', [SearchController::class, 'getKodeBuku']);
        Route::get('getFilePlace/{id}', [SearchController::class, 'getFilePlace']);
        // My Profile
        Route::get('myprofile', [App\Http\Controllers\Admin\AccountController::class, 'myadminprofile'])->name('myprofile');
        Route::get('editmyprofile', [App\Http\Controllers\Admin\AccountController::class, 'editmyadminprofile'])->name('editmyprofile');
        Route::match(['put', 'patch'],'deleteaccount/{id}', [App\Http\Controllers\Admin\AccountController::class, 'nonactiveadminaccount'])->name('nonactiveaccount');
        Route::match(['put', 'patch'],'editmyprofile/{id}', [App\Http\Controllers\Admin\AccountController::class, 'updatemyadminprofile'])->name('updatemyprofile');
        // Check
        Route::match(['put', 'patch'],'admin/donasi-admin/accept/{donasi_admin_berhasil}', [App\Http\Controllers\Admin\DonasiAdminController::class, 'checkberhasil'])->name('donasi-admin.checkberhasil');
        Route::match(['put', 'patch'],'admin/donasi-admin/decline/{donasi_admin_ditolak}', [App\Http\Controllers\Admin\DonasiAdminController::class, 'checkditolak'])->name('donasi-admin.checkditolak');
        Route::match(['put', 'patch'],'user/user-admin/block/{user_non_active}', [App\Http\Controllers\Admin\UserController::class, 'userblock'])->name('user-admin.userblock');
        // Search
        Route::get('buku/catalog-admin-search/',  [SearchController::class, 'searchCatalogAdmin'])->name('searchcatalog.admin');
        Route::get('buku/jenis-buku-search/',  [SearchController::class, 'searchJenisBukuAdmin'])->name('searchjenisbuku.admin');
        Route::get('user/user-admin-search/',  [SearchController::class, 'searchPenggunaAdmin'])->name('searchpengguna.admin');
        Route::get('admin/booking-admin-search/',  [SearchController::class, 'searchPeminjamanAdmin'])->name('searchpeminjaman.admin');
        Route::get('admin/donasi-admin-search/',  [SearchController::class, 'searchDonasiAdmin'])->name('searchdonasi.admin');

    });

    // For Consumen
    Route::middleware(['is_anggota'])->group(function () {
        Route::match(['put', 'patch'],'catalog/{booking_anggota}', [App\Http\Controllers\Component\CheckController::class, 'pinjam'])->name('booking-anggota.pinjam');
        Route::match(['put', 'patch'],'history/{history_cancel}', [App\Http\Controllers\Component\CheckController::class, 'cancel'])->name('history.cancel');
        Route::match(['put', 'patch'],'donasibuku/cancel/{donasi_cancel}', [App\Http\Controllers\Anggota\DonasiController::class, 'cancel'])->name('donasibuku.cancel');
        Route::resource('history', HistoryController::class);
        Route::resource('donasibuku', DonasiController::class);
        // Route::resource('/catalog', CatalogController::class);
    });
});
