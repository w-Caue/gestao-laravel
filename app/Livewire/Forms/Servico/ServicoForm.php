<?php

namespace App\Livewire\Forms\Servico;

use App\Models\Servico;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ServicoForm extends Form
{
    public $codigo;

    #[Validate('required|min:5')]
    public $descricao;

    public $imagem;

    public $preco;

    public $dataCadastro;

    public $inativo;

    public function save()
    {
        $servico = Servico::create([
            'DESCRICAO' => strtoupper($this->descricao),
            'PRECO' => $this->preco,
            'DATA_CADASTRO' => date('Y-m-d'),
        ]);

        $this->codigo = $servico->id;

        return $servico;
    }

    public function show($codigo)
    {
        $servico = Servico::where('ID', $codigo)->first();

        $this->codigo = $servico->ID;
        $this->descricao = $servico->DESCRICAO;
        $this->preco = $servico->PRECO;
        $this->dataCadastro = date('Y-m-d', strtotime($servico->DATA_CADASTRO));

        $inativo = false;

        if ($servico->INATIVO == 'S') {
            $inativo = true;
        }

        $this->inativo = $inativo;

        return;
    }

    public function update()
    {
        $inativo = 'N';

        if ($this->inativo) {
            $inativo = 'S';
        }

        $servico = Servico::where('ID', $this->codigo)->update([
            'DESCRICAO' => strtoupper($this->descricao),
            'PRECO' => $this->preco,
            'INATIVO' => $inativo,
        ]);

        return $servico;
    }
}
