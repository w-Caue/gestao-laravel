<?php

namespace App\Livewire\Forms\Produtos;

use App\Models\Produto;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ProdutosForm extends Form
{
    use WithFileUploads;

    public $codigo;

    public $nome;
    public $descricao;

    public $tamanhos = [];

    public $photo;

    public $preco1;
    public $preco2;

    public function save()
    {
        $tamanhos = implode(', ', $this->tamanhos);

        $produto = Produto::create([
            'NOME' => $this->nome,
            'DESCRICAO' => $this->descricao,
            'TAMANHO' => $tamanhos,
            'PRECO1' => $this->preco1,
            'PRECO2' => $this->preco2,
            'DATA_CADASTRO' => date('Y-m-d'),
        ]);

        $this->codigo = $produto->ID;

        return $produto;
    }

    public function show($codigo)
    {
        $produto = Produto::select([
            'PRODUTOS.*',
        ])
            ->where('PRODUTOS.ID', $codigo)
            ->first();

        $this->codigo = $produto->ID;
        $this->nome = $produto->NOME;
        $this->descricao = $produto->DESCRICAO;

        $this->tamanhos = $produto->TAMANHO;

        $this->preco1 = $produto->PRECO1;
        $this->preco2 = $produto->PRECO2;

        return;
    }
}
