<?php

namespace App\Livewire\Produtos;

use App\Livewire\Forms\Produtos\ProdutosForm;
use App\Models\Produto;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProdutosList extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;

    public ProdutosForm $form;

    #PESQUISA
    public $search;

    #FILTROS DA TABELA
    public $sortField = 'ID';
    public $sortAsc = true;


    public function dados()
    {
        $produtos = Produto::select([
            'PRODUTOS.*',
        ])
            ->paginate();

        return $produtos;
    }

    public function save()
    {
        $this->form->save();

        $this->dispatch('close-modal-large');

        // $this->reset($this->form->nome, $this->form->descricao, $this->form->tamanhos, $this->form->preco1, $this->form->preco2);

        return $this->alert('success', 'PRODUTO ' . $this->form->codigo . ' CADASTRADO!', [
            'position' => 'center',
            'timer' => '2000',
            'toast' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.produtos.produtos-list', ['produtos' => $this->dados()]);
    }
}
