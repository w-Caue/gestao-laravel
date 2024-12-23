<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;

class PedidosList extends Component
{
    #PESQUISA
    public $search;

    #FILTROS DA TABELA
    public $sortField = 'ID';
    public $sortAsc = true;

    public function render()
    {
        return view('livewire.pedidos.pedidos-list');
    }
}
