<?php

namespace App\Livewire\Forms\Produtos;

use App\Models\Produto;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProdutosForm extends Form
{
    public $codigo;

    public $nome;
    public $descricao;

    public $tamanhos;

    public $foto;

    public $preco1;
    public $preco2;

    public function save(){
        $produto = Produto::create([
            'NOME' => $this->nome,
            'DESCRICAO' => $this->descricao,
            'TAMANHO' => $this->tamanhos,
            'PRECO1' => $this->preco1,
            'PRECO2' => $this->preco2,
        ]);
    }
}
