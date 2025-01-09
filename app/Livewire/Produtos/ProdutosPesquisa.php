<?php

namespace App\Livewire\Produtos;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutosPesquisa extends Component
{
    use WithPagination;

    #PESQUISA
    public $search;

    #FILTROS DA TABELA
    public $sortField = 'ID';
    public $sortAsc = true;

    public $listeners = [
        'dados' => 'dados',
        'setProduto' => 'setProduto',
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
    public function render()
    {
        return view('livewire.produtos.produtos-pesquisa', ['produtos' => $this->dados()]);
    }
}
