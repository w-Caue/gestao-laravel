<?php

use App\Livewire\Agenda\Calendar;
use App\Livewire\Auth\Login;
use App\Livewire\Clientes\ClientesList;
use App\Livewire\Clientes\ClientesRegister;
use App\Livewire\Dashboard;
use App\Livewire\Funcionarios\FuncionariosList;
use App\Livewire\Pedidos\PedidosList;
use App\Livewire\Pedidos\PedidosRegister;
use App\Livewire\Servicos\ServicosList;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/login', Login::class)->name('login');

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');

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

    Route::prefix('/pedidos')->name('pedidos.')->group(function () {
        Route::get('/', PedidosList::class)
            ->name('listagem');
    });

    Route::prefix('/funcionarios')->name('funcionarios.')->group(function () {
        Route::get('/', FuncionariosList::class)
            ->name('listagem');
    });
});
