<?php

namespace App\Livewire\Produtos;

use App\Livewire\Forms\Produtos\ProdutosForm;
use Livewire\Component;

class ProdutosRegister extends Component
{
    public ProdutosForm $form;
    
    public $listeners = [
        'consulta' => 'consulta',
    ];

    public function consulta($codigo)
    {
        $this->form->show($codigo);
    }
    
    public function render()
    {
        return view('livewire.produtos.produtos-register');
    }
}
