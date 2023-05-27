<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false,
]);

Route::middleware(['auth'])->group(function () {
    //Route for Admin Dashboard
    Route::get('/', App\Http\Livewire\Home\Index::class)->name('home');

    //Route for Admin Manager
    Route::get('/manager', App\Http\Livewire\Manager\Index::class)->name('manager.index');

    //Route for Admin Sales
    Route::get('/sales', App\Http\Livewire\Sales\Index::class)->name('sales.index');

    //Route for Admin Partner
    Route::get('/partner', App\Http\Livewire\Partner\Index::class)->name('partner.index');
    Route::get('/partner/{id}', App\Http\Livewire\Partner\Detail::class)->name('partner.detail');

    //Route for Admin Aktivitas Sales
    Route::get('/aktivitas', App\Http\Livewire\Aktivitas\Index::class)->name('aktivitas.index');
    Route::get('/aktivitas/create', App\Http\Livewire\Aktivitas\Create::class)->name('aktivitas.create');
    Route::get('/aktivitas/{id}', App\Http\Livewire\Aktivitas\Update::class)->name('aktivitas.update');

    //setting
    Route::get('/setting', App\Http\Livewire\Setting\Index::class)->name('setting.index');

    //TODO:: PR
    Route::get('/profile', App\Http\Livewire\Profile\Index::class)->name('profile.index');
});
