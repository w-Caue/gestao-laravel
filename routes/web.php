<?php

use App\Livewire\Agenda\Calendar;
use App\Livewire\Auth\Ecommerce\Login as EcommerceLogin;
use App\Livewire\Auth\Login;
use App\Livewire\Clientes\ClientesList;
use App\Livewire\Clientes\ClientesRegister;
use App\Livewire\Dashboard;
use App\Livewire\Funcionarios\FuncionariosList;
use App\Livewire\Pedidos\PedidosList;
use App\Livewire\Pedidos\PedidosRegister;
use App\Livewire\Produtos\ProdutosList;
use App\Livewire\Servicos\ServicosList;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Routes Admin
require_once "admin.php";

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::get('/login', function(){
    return view('pages.auth.ecommerce.login');
})->name('login');
