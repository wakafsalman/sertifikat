<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\UserController;


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

//Wakaf Salman E-Sertifikat
Route::get('/', [SertifikatController::class, 'index'])->name('login');
Route::get('/beranda', [SertifikatController::class, 'beranda']);
Route::post('/proses_login', [SertifikatController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [SertifikatController::class, 'logout']);
Route::get('/sertifikat/{id}/preview', [SertifikatController::class, 'lihat_sertifikat'])->name('lihat_sertifikat');

//Donatur
Route::get('/donatur', [DonaturController::class, 'index'])->name('donatur');
Route::post('/tambah_donatur', [DonaturController::class, 'tambah_donatur'])->name('tambah_donatur');
Route::post('/rubah_donatur/{id}', [DonaturController::class, 'rubah_donatur'])->name('proses_rubah_donatur');
Route::get('/hapus_donatur/{id}', [DonaturController::class, 'hapus_donatur'])->name('hapus_donatur');
Route::delete('/hapus_donatur_pilihan', [DonaturController::class, 'hapus_donatur_pilihan'])->name('hapus_donatur_pilihan');

//User
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/tambah_user', [UserController::class, 'tambah_user'])->name('tambah_user');
Route::post('/rubah_user/{id}', [UserController::class, 'rubah_user'])->name('rubah_user');
Route::get('/hapus_user/{id}', [UserController::class, 'hapus_user'])->name('hapus_user');

//PDF
Route::get('/eksport_pdf/{id}', [DonaturController::class, 'eksport_pdf'])->name('eksport_pdf');
Route::get('/print_pdf/{id}', [DonaturController::class, 'print_pdf'])->name('print_pdf');

//Excel

/*donatur*/
Route::post('/import_excel', [DonaturController::class, 'import_excel'])->name('import_excel');
