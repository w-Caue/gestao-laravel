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

    public function save()
    {
        $servico = Servico::create([
            'descricao' => strtoupper($this->descricao),
            'preco' => $this->preco,
            'data_cadastro' => date('Y-m-d'),
        ]);

        $this->codigo = $servico->id;

        return $servico;
    }
}
