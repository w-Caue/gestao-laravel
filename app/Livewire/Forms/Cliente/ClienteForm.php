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

    public $inativo;

    public $clienteFavorito;

    public function save()
    {
        // $this->validate();

        $cliente = Cliente::create([
            'NOME' => strtoupper($this->nome),
            'EMAIL' => strtoupper($this->email),
            'TELEFONE' => $this->telefone,
            'DATA_CADASTRO' => date('Y-m-d'),
        ]);

        $this->codigo = $cliente->id;

        return $cliente;
    }

    public function show($codigo)
    {
        $cliente = Cliente::where('ID', $codigo)->first();

        $this->codigo = $cliente->ID;
        $this->nome = $cliente->NOME;
        $this->email = $cliente->EMAIL;
        $this->telefone = $cliente->TELEFONE;
        $this->dataCadastro = date('Y-m-d', strtotime($cliente->DATA_CADASTRO));

        $inativo = 'N';
        if ($this->inativo) {
            $inativo = 'S';
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

        $cliente = Cliente::findOrFail($this->codigo)->update([
            'NOME' => strtoupper($this->nome),
            'EMAIL' => strtoupper($this->email),
            'TELEFONE' => $this->telefone,
            'DATA_CADASTRO' => $this->dataCadastro,
            'INATIVO' => $inativo,
        ]);

        return $cliente;
    }

    public function setFavorito($codigo)
    {
        $cliente = Cliente::where('ID', $codigo)->get('FAVORITO')->first();

        $this->clienteFavorito = 'N';

        if ($cliente->FAVORITO == 'N') {
            $this->clienteFavorito = 'S';
        }

        $cliente = Cliente::where('ID', $codigo)->update([
            'FAVORITO' => $this->clienteFavorito,
        ]);

        return $cliente;
    }
}
