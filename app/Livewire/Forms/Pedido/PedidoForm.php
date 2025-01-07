<?php

namespace App\Livewire\Forms\Pedido;

use App\Models\Pedido;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PedidoForm extends Form
{
    public $codigo;

    public $cliente;
    public $vendedor;

    public $dataCriacao;

    public $pagamento;
    public $observacao;

    public function show($codigo)
    {
        $pedido = Pedido::select([
            'PEDIDOS.*',
            'CLIENTES.NOME AS CLIENTE_NOME',
            'FUNCIONARIOS.NOME AS VENDEDOR_NOME',
        ])
            ->where('PEDIDOS.ID', $codigo)

            ->leftjoin('CLIENTES', 'CLIENTES.ID', '=', 'PEDIDOS.CLIENTE')
            ->leftjoin('FUNCIONARIOS', 'FUNCIONARIOS.ID', '=', 'PEDIDOS.VENDEDOR')
            ->first();

        $this->codigo = $pedido->ID;
        $this->cliente = $pedido->CLIENTE_NOME;
        $this->vendedor = $pedido->VENDEDOR_NOME;

        $this->dataCriacao = $pedido->DATA_CADASTRO;

        $this->pagamento = $pedido->PAGAMENTO;
        $this->observacao = $pedido->OBSERVACAO;

        return;
    }
}
