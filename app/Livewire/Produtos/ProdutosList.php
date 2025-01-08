<?php

namespace App\Livewire\Produtos;

use App\Livewire\Forms\Produtos\ProdutosForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ProdutosList extends Component
{
    use LivewireAlert;

    public ProdutosForm $form;

    #PESQUISA
    public $search;

    #FILTROS DA TABELA
    public $sortField = 'ID';
    public $sortAsc = true;
    

    public function save()
    {
        $this->form->save();

        $this->dispatch('close-modal-medium');

        return $this->alert('success', 'Cliente ' . $this->form->codigo . ' cadastrado!', [
            'position' => 'center',
            'timer' => '3000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        return view('livewire.produtos.produtos-list');
    }
}
