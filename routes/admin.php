<?php

use App\Livewire\Clientes\ClientesList;
use App\Livewire\Dashboard;
use App\Livewire\Funcionarios\FuncionariosList;
use App\Livewire\Pedidos\PedidosList;
use App\Livewire\Pedidos\PedidosRegister;
use App\Livewire\Produtos\ProdutosList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/admin/login', function () {
//     return view('pages.auth.login');
// })->name('admin.login');

// Route::get('/admin/logout', function () {
//     Auth::logout(false);
//     session()->flush();
//     // return redirect()->route('welcome');
// })->name('admin.logout');

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

        Route::get('/{codigo}', PedidosRegister::class)
            ->name('register');
    });

    Route::prefix('/produtos')->name('produtos.')->group(function () {
        Route::get('/', ProdutosList::class)
            ->name('listagem');
    });

    Route::prefix('/funcionarios')->name('funcionarios.')->group(function () {
        Route::get('/', FuncionariosList::class)
            ->name('listagem');
    });
});