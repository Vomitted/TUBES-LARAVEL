<?php

use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [VendorController::class, 'index'])->name('home');
Route::resource('vendors', VendorController::class);

// Backwards compatibility for old native PHP link
Route::get('/B_ModulVendorDanSupplier.php', function () {
    return redirect()->route('vendors.index');
});
