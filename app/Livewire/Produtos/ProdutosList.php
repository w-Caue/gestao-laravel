<?php

namespace App\Livewire\Produtos;

use Livewire\Component;

class ProdutosList extends Component
{
    #PESQUISA
    public $search;

    #FILTROS DA TABELA
    public $sortField = 'ID';
    public $sortAsc = true;
    
    public function render()
    {
        return view('livewire.produtos.produtos-list');
    }
}
