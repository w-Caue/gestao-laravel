<?php

namespace App\Livewire\Forms\Funcionario;

use App\Models\Funcionario;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FuncionarioForm extends Form
{
    public $codigo;

    #[Validate('required|min:5')]
    public $nome;

    #[Validate('email')]
    public $email;

    #[Validate('min:12')]
    public $telefone;

    public $tipo = 'V';

    public $dataCadastro;

    public $inativo;

    public $clienteFavorito;


    public function save()
    {
        // $this->validate();

        $funcionario = Funcionario::create([
            'NOME' => strtoupper($this->nome),
            'EMAIL' => strtoupper($this->email),
            'TELEFONE' => $this->telefone,
            'TIPO' => $this->tipo,
            'DATA_CADASTRO' => date('Y-m-d'),
        ]);

        $this->codigo = $funcionario->id;

        return $funcionario;
    }

    public function show($codigo)
    {
        $funcionario = Funcionario::where('ID', $codigo)->first();

        $this->codigo = $funcionario->ID;
        $this->nome = $funcionario->NOME;
        $this->email = $funcionario->EMAIL;
        $this->telefone = $funcionario->TELEFONE;
        $this->tipo = $funcionario->TIPO;
        $this->dataCadastro = date('Y-m-d', strtotime($funcionario->DATA_CADASTRO));

        $inativo = false;

        if ($funcionario->ATIVO == 'N') {
            $inativo = true;
        }

        $this->inativo = $inativo;

        return;
    }

    public function update()
    {
        $inativo = 'S';

        if ($this->inativo) {
            $inativo = 'N';
        }

        $funcionario = Funcionario::where('ID', $this->codigo)->update([
            'NOME' => strtoupper($this->nome),
            'EMAIL' => strtoupper($this->email),
            'TELEFONE' => $this->telefone,
            'TIPO' => $this->tipo,
            'ATIVO' => $inativo,
        ]);

        return $funcionario;
    }
}
