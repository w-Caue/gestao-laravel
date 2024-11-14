<?php

namespace App\Livewire\Forms\Cliente;

use App\Models\Cliente;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ClienteForm extends Form
{
    public $codigo;

    #[Validate('required|min:5')]
    public $nome;

    #[Validate('email')]
    public $email;

    #[Validate('min:12')]
    public $telefone;

    public $dataCadastro;

    public function save()
    {
        // $this->validate();

        $cliente = Cliente::create([
            'nome' => strtoupper($this->nome),
            'email' => strtoupper($this->email),
            'telefone' => $this->telefone,
            'data_cadastro' => date('Y-m-d'),
        ]);

        $this->codigo = $cliente->id;

        return $cliente;
    }

    public function show($codigo)
    {
        $cliente = Cliente::where('id', $codigo)->first();

        $this->codigo = $cliente->id;
        $this->nome = $cliente->nome;
        $this->email = $cliente->email;
        $this->telefone = $cliente->telefone;
        $this->dataCadastro = date('Y-m-d', strtotime($cliente->data_cadastro));

        return;
    }

    public function update()
    {
        $cliente = Cliente::findOrFail($this->codigo)->update([
            'nome' => strtoupper($this->nome),
            'email' => strtoupper($this->email),
            'telefone' => $this->telefone,
            'data_cadastro' => $this->dataCadastro,
        ]);

        return $cliente;
    }
}
