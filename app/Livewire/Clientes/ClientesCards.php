<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class ClientesCards extends Component
{
    public $total;
    public $novos;
    public $favoritos; 
    public $inativos; 

    public $listeners = [
        'consultas' => 'consultas',
    ];

    public function consultas()
    {
        $this->total = Cliente::get('ID')->count();

        $mes = date('m');

        $this->novos = Cliente::whereMonth('DATA_CADASTRO', $mes)->count();

        $this->inativos = Cliente::where('INATIVO', 'S')->count();

        $this->favoritos = Cliente::where('FAVORITO', 'S')->count();
    }

    public function render()
    {
        $this->consultas();
        return view('livewire.clientes.clientes-cards');
    }
}
