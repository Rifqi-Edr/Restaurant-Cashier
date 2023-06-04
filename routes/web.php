<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use \App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UserMakananController;
use App\Http\Controllers\UserMinumanController;

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


//Route::get('pegawai', [PegawaiController::class, 'index']);
//Route::get('pegawai/{id}', [PegawaiController::class, 'detail'])->where('id', '[0-9]+');

Route::resource('user', PegawaiController::class);


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/makanan', [App\Http\Controllers\UserMakananController::class, 'index'])->name('makanan');
Route::get('/minuman', [App\Http\Controllers\UserMinumanController::class, 'index'])->name('minuman');
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginPost'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/menu', [MenuController::class, 'index'])->name('index');
Route::get('/edit/{jenis}/{id}', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('/update/{jenis}/{id}', [MenuController::class, 'update'])->name('menu.update');
Route::get('/add', [MenuController::class, 'addPage'])->name('add.page');
Route::post('/add', [MenuController::class, 'store'])->name('menu.store');
Route::delete('/makanan/{id}', [MenuController::class, 'deleteMakanan'])->name('menu.makanan.delete');
Route::delete('/minuman/{id}', [MenuController::class, 'deleteMinuman'])->name('menu.minuman.delete');

Route::get('cartMakanan/{id}', [UserMakananController::class, 'addToCart'])->name('add_to_cart');
Route::get('cartMinuman/{id}', [UserMinumanController::class, 'addToCart'])->name('add_to_cart_minuman');
Route::delete('/cart/{id}', [UserMakananController::class, 'remove'])->name('cart_remove');
Route::delete('/cartminuman/{id}', [UserMinumanController::class, 'remove'])->name('cart_remove_minuman');
Route::patch('update-cart', [UserMakananController::class, 'update'])->name('update_cart');
Route::patch('update-cart-minuman', [UserMinumanController::class, 'update'])->name('update_minuman');

Route::post('/proses-pembayaran', [App\Http\Controllers\PembayaranController::class, 'prosesPembayaran'])->name('proses_pembayaran');

Route::get('report', [\App\Http\Controllers\ReportController::class, 'report'])->name('report');












