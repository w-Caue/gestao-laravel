<?php

use App\Livewire\Auth\Login;
use App\Livewire\Clientes\ClientesList;
use App\Livewire\Dashboard;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', Login::class)->name('login');

Route::get('/logout', function () {
    Auth::logout(false);
    session()->flush();
    // return redirect()->route('welcome');
})->name('logout');

Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {

    Route::get('/dashboard', Dashboard::class)
        ->name('dashboard');

    Route::prefix('/clientes')->name('clientes.')->group(function () {
        Route::get('/', ClientesList::class)
            ->name('listagem');
    });
});
