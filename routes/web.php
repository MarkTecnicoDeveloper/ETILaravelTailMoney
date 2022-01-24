<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\BalanceConroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|c
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('site.home.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.home.index');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/balance', [BalanceConroller::class, 'index'])->middleware(['auth'])->name('dashboard.balance');
Route::get('/dashboard/deposit', [BalanceConroller::class, 'deposit'])->middleware(['auth'])->name('balance.deposit');
Route::post('/dashboard/deposit', [BalanceConroller::class, 'depositStore'])->middleware(['auth'])->name('deposit.store');
Route::get('/dashboard/withdraw', [BalanceConroller::class, 'withdraw'])->middleware(['auth'])->name('balance.withdraw');
Route::post('/dashboard/withdraw', [BalanceConroller::class, 'withdrawStore'])->middleware(['auth'])->name('withdraw.store');
Route::get('/dashboard/transfer', [BalanceConroller::class, 'transfer'])->middleware(['auth'])->name('balance.transfer');
Route::post('/dashboard/confirm-transfer', [BalanceConroller::class, 'confirmTransfer'])->middleware(['auth'])->name('confirm.transfer');
Route::post('/dashboard/transfer', [BalanceConroller::class, 'transferStore'])->middleware(['auth'])->name('transfer.store');
Route::get('/dashboard/historic', [BalanceConroller::class, 'historic'])->middleware(['auth'])->name('dashboard.historic');
Route::any('/dashboard/historic-search', [BalanceConroller::class, 'searchHistoric'])->middleware(['auth'])->name('historic.search');

require __DIR__.'/auth.php';
