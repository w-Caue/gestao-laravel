<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class ClientesCards extends Component
{
    public $total;
    public $novos;
    public $deletados; 
    public $inativos; 

    public function consultas()
    {
        $this->total = Cliente::get('id')->count();

        $mes = date('m');

        $this->novos = Cliente::whereMonth('data_cadastro', $mes)->count();

        $this->inativos = Cliente::get('inativo')->count();
    }

    public function render()
    {
        $this->consultas();
        return view('livewire.clientes.clientes-cards');
    }
}
