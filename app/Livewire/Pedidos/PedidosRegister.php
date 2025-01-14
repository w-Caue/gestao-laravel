<?php

namespace App\Livewire\Pedidos;

use App\Livewire\Forms\Pedido\PedidoForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PedidosRegister extends Component
{
    public PedidoForm $form;
    
    public $listeners = [
        'consulta' => 'consulta',
    ];

    public function mount($codigo)
    {
        $this->form->show($codigo);
    }

    public function render()
    {
        return view('livewire.pedidos.pedidos-register');
    }
}
