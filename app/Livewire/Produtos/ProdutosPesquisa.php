<?php

namespace App\Livewire\Produtos;

use App\Models\PedidoItem;
use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutosPesquisa extends Component
{
    use WithPagination;

    #PESQUISA
    public $search;

    public $porPagina;

    #FILTROS DA TABELA
    public $sortField = 'ID';
    public $sortAsc = true;

    public $codigoPedido;

    public $quantidade = 0;
    public $desconto;
    public $valorUnitario;

    public $listeners = [
        'dados' => 'dados',
        'setProduto' => 'setProduto',
        'setPedido' => 'setPedido',
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function setProduto()
    {
        $this->dispatch('open-large-modal');
    }

    public function dados()
    {
        $produtos = Produto::select([
            'PRODUTOS.*'
        ])
            ->when(!empty($this->search), function ($query) {
                $search = strtoupper($this->search);
                $search  = str_replace(" ", "%", $search);
                return $query->where($this->sortField, 'LIKE', "%$search%");
            })

            ->paginate(5);

        return $produtos;
    }

    # PEDIDO #
    // public function setPedido($codigo)
    // {
    //     $this->codigoPedido = $codigo;
    // }

    # PEDIDO #
    public function produtoPedido($codigo)
    {
        // $pedidoItem = PedidoItem::where('ID', '=', 1)->where('ID', '=', $codigo)->first();

        // if ($pedidoItem != null) {
        //     $this->quantidade = $pedidoItem['QUANTIDADE'];
        //     $this->desconto = number_format($pedidoItem['DESCONTO_PER'], 2);
        //     $this->valorUnitario = $pedidoItem['PRECO_VENDIDO'];

        //     // $this->codigoPedido = $codigoPedido;
            
        // } else {
        //     $this->quantidade = 0;
        //     $this->desconto = '';
        //     $this->valorUnitario = '';
        // }

        $produto = Produto::where('ID', '=', $codigo)->get(['ID', 'NOME', 'DESCRICAO'])->first();

        return $produto;

    }

    public function render()
    {
        return view('livewire.produtos.produtos-pesquisa', ['produtos' => $this->dados()]);
    }
}
