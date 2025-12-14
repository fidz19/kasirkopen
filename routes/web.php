<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

// Auth Routes
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Protected routes
Route::middleware(['kasir.auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Route dummy untuk menu navigasi
    Route::get('/transaksi', function() { return 'Halaman Transaksi'; })->name('transaksi.index');
    Route::get('/menu', function() { return 'Halaman Menu'; })->name('menu.index');
    Route::get('/laporan', function() { return 'Halaman Laporan'; })->name('laporan.index');


});
    
    // Menu Management
    Route::prefix('menu')->name('menu.')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('index');
        Route::get('/create', [MenuController::class, 'create'])->name('create');
        Route::post('/', [MenuController::class, 'store'])->name('store');
        Route::get('/{menu}', [MenuController::class, 'show'])->name('show');
        Route::get('/{menu}/edit', [MenuController::class, 'edit'])->name('edit');
        Route::put('/{menu}', [MenuController::class, 'update'])->name('update');
        Route::delete('/{menu}', [MenuController::class, 'destroy'])->name('destroy');
        Route::post('/{menu}/stok', [MenuController::class, 'updateStok'])->name('updateStok');
        
    });
    
    // Transaksi (POS & History)
    Route::prefix('transaksi')->name('transaksi.')->group(function () {
        Route::get('/', [TransaksiController::class, 'index'])->name('index'); // POS Page
        Route::post('/', [TransaksiController::class, 'store'])->name('store'); // Process Transaction
        Route::get('/history', [TransaksiController::class, 'history'])->name('history'); // Transaction History
        Route::get('/{transaksi}', [TransaksiController::class, 'show'])->name('show'); // Detail Transaction
        Route::get('/{transaksi}/print', [TransaksiController::class, 'printStruk'])->name('print'); // Print Receipt
        Route::delete('/{transaksi}', [TransaksiController::class, 'cancel'])->name('cancel'); // Cancel Transaction
        
    });
    
    // Laporan (Reports)
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->name('index');
        Route::get('/pdf', [LaporanController::class, 'exportPdf'])->name('pdf');
        Route::get('/excel', [LaporanController::class, 'exportExcel'])->name('excel');
        Route::post('/save', [LaporanController::class, 'save'])->name('save');
    });
    