<?php

namespace App\Livewire\Pedidos;

use App\Models\Cliente;
use Livewire\Component;

class PedidoNovo extends Component
{
    public $codCliente;
    public $clientePedido;

    public $listeners = [
        'setClientePedido' => 'setClientePedido',
    ];

    public function setClientePedido($codigo)
    {
        $this->codCliente = $codigo;

        $this->clientePedido = Cliente::where('ID', $codigo)->get(['ID', 'NOME'])->first();

        // $this->form->setCliente($codigo);

        $this->dispatch('close-modal-large');

        return;
    }

    public function render()
    {
        return view('livewire.pedidos.pedido-novo');
    }
}
