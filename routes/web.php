<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\kelola_data_lembaga_Controller;
use App\Http\Controllers\rekapAPT_Controller;
use App\Http\Controllers\rekapAProdi_Controller;
use App\Http\Controllers\validasi_data_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//   return view('welcome');
//});

// Route Main
Route::get('login', [MainController::class, 'index'])->name('login');
Route::post('postlogin', [MainController::class, 'login'])->name('postlogin'); 
Route::get('signup', [MainController::class, 'signup'])->name('registration');
Route::post('postsignup', [MainController::class, 'signupsave'])->name('postsignup'); 
Route::get('signout', [MainController::class, 'signout'])->name('signout');

// Route Homepage
Route::get('/', [HomepageController::class, 'index'])->name('dashboard_homepage');
Route::get('listPT', [HomepageController::class, 'listpt'])->name('listPT');
Route::get('sebaranPT', [HomepageController::class, 'sebaranpt'])->name('sebaranPT');
Route::get('kerjasamaPT', [HomepageController::class, 'kerjasamapt'])->name('kerjasamaPT');
Route::get('inovasiPT', [HomepageController::class, 'inovasipt'])->name('inovasiPT');
Route::get('imp4a', [HomepageController::class, 'imp4a'])->name('imp4a');
Route::get('impMBKM', [HomepageController::class, 'impMBKM'])->name('impMBKM');
Route::get('pemantauanTM', [HomepageController::class, 'pemantauanTM'])->name('pemantauanTM');

// Route Grup Admin
Route::group(['middleware' => ['auth', 'prevent-back-history']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard_admin');

    // Route Kelola Data Lembaga
    Route::get('kelola_data_pt', [kelola_data_lembaga_Controller::class,'kelola_data_pt'])->name('kelola_data_pt');
    Route::get('kelola_data_pt/data', [kelola_data_lembaga_Controller::class, 'getData'])->name('kelola_data_pt.data');
    Route::put('update_data_pt/{kode_pt}', [kelola_data_lembaga_Controller::class,'update_data_pt'])->name('update_data_pt');
    Route::get('daftar_prodi', [kelola_data_lembaga_Controller::class, 'daftar_prodi'])->name('daftar_prodi');
    Route::put('update_data_prodi/{kode_prodi}', [kelola_data_lembaga_Controller::class,'update_data_prodi'])->name('update_data_prodi');

    Route::get('kelola_data_prodi', [kelola_data_lembaga_Controller::class,'kelola_data_prodi'])->name('kelola_data_prodi');
    
    // Route Rekap Data
    Route::get('rekap_apt', [rekapAPT_Controller::class, 'rekap_apt'])->name('rekap_apt');
    Route::post('proses-filter-apt', [rekapAPT_Controller::class, 'prosesFilterAPT'])->name('prosesFilterAPT');
    

    Route::get('rekap_aprodi', [rekapAProdi_Controller::class, 'rekap_aprodi'])->name('rekap_aprodi');
    Route::post('proses-filter-aprodi', [rekapAProdi_Controller::class, 'prosesFilterAProdi'])->name('prosesFilterAProdi');

    // Route Valdasi Data
    Route::get('validasi_apt', [validasi_data_Controller::class,'validasi_apt'])->name('validasi_apt');

    Route::get('validasi_aprodi', [validasi_data_Controller::class,'validasi_aprodi'])->name('validasi_aprodi');
});

// Export To Excel
Route::post('export-excel-apt', [rekapAPT_Controller::class, 'exportToExcelAPT'])->name('export.excelAPT');
Route::post('export-excel-aprodi', [rekapAProdi_Controller::class, 'exportToExcelAProdi'])->name('export.excelAProdi');
