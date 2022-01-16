<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\BalanceConroller;

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
    return view('site.home.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.home.index');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/balance', [BalanceConroller::class, 'index'])->middleware(['auth'])->name('dashboard.balance');

require __DIR__.'/auth.php';
