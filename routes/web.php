<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\VoucherController;
use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('postlogin');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('postRegister');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/landing', function () {
//     return view('customer.landingpage');
// })->name('landing');

Route::middleware([CekLevel::class . ':1, 2, 3'])->group(function () {
    Route::get('/admin/layout', function () {
        return view('layout');
    });
});

Route::middleware([CekLevel::class . ':1, 2'])->group(function () {
    Route::get('/admin/layout', function () {
        return view('layout');
    });
    Route::get('/admin/voucher', [VoucherController::class, 'index'])->name('voucher');
    Route::post('/admin/voucher', [VoucherController::class, 'store'])->name('voucher.store');
    Route::post('/admin/voucherr', [VoucherController::class, 'decline'])->name('voucher.decline');
    Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::post('/admin/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/admin/laporan/{id_transaksi}', [LaporanController::class, 'show'])->name('laporan.show');
    Route::get('/member/{id_member}/points', [MemberController::class, 'getPoints']);
    Route::get('/laporan/export', [LaporanController::class, 'export'])->name('laporan.export');
});

Route::middleware([CekLevel::class . ':1'])->group(function () {
    Route::get('/admin/kasir', [KasirController::class, 'index'])->name('kasir');
    Route::post('/admin/tambahkasir', [KasirController::class, 'store'])->name('kasir.store');
    Route::post('/admin/updatekasir/{id_kasir}', [KasirController::class, 'update'])->name('kasir.update');
    Route::post('/admin/hapuskasir/{id_kasir}', [KasirController::class, 'destroy'])->name('kasir.destroy');
    Route::get('/admin/member', [MemberController::class, 'index'])->name('member');
    Route::post('/admin/member', [MemberController::class, 'store'])->name('member.store');
    Route::post('/admin/member/update/{id_member}', [MemberController::class, 'update'])->name('member.update');
    Route::post('/admin/member/delete/{id_member}', [MemberController::class, 'destroy'])->name('member.destroy');
    Route::get('/admin/produk', [ProdukController::class, 'index'])->name('produk');
    Route::post('/admin/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::post('/admin/produk/update/{id_produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::post('/admin/produk/delete/{id_produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    // Route::get('/admin/laporan', function () {return view('admin.report');});
    // Route::get('/admin/voucher', function () {
    //     return view('admin.voucher');
    // });
    Route::resource('produk', ProdukController::class);
});

Route::middleware([CekLevel::class . ':2'])->group(function () { });

Route::middleware([CekLevel::class . ':3'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
    Route::post('/customer/tukar-poin', [CustomerController::class, 'store'])->name('customer.tukar');
    Route::get('/customer/produk/{id_produk}', [CustomerController::class, 'show'])->name('customer.show');
});
