<?php

namespace App\Livewire\Pedidos;

use App\Models\Pedido;
use Livewire\Component;

class PedidosList extends Component
{
    #PESQUISA
    public $search;

    #FILTROS DA TABELA
    public $sortField = 'ID';
    public $sortAsc = true;

    public function dados()
    {
        $pedidos = Pedido::select([
            'PEDIDOS.*',
            'CLIENTES.NOME AS CLIENTE_NOME',
            'FUNCIONARIOS.NOME AS VENDEDOR_NOME',
        ])
            ->leftjoin('CLIENTES', 'CLIENTES.ID', '=', 'PEDIDOS.CLIENTE')
            ->leftjoin('FUNCIONARIOS', 'FUNCIONARIOS.ID', '=', 'PEDIDOS.VENDEDOR')
            ->paginate(5);

        return $pedidos;
    }

    public function render()
    {
        return view('livewire.pedidos.pedidos-list', ['pedidos' => $this->dados()]);
    }
}
