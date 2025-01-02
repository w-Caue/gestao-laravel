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

    public $tipo = 'C';

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
            'TIPO' => $this->tipo,
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
        $this->tipo = $cliente->TIPO;
        $this->dataCadastro = date('Y-m-d', strtotime($cliente->DATA_CADASTRO));

        $inativo = false;

        if ($cliente->ATIVO == 'N') {
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

        $cliente = Cliente::where('ID', $this->codigo)->update([
            'NOME' => strtoupper($this->nome),
            'EMAIL' => strtoupper($this->email),
            'TELEFONE' => $this->telefone,
            'TIPO' => $this->tipo,
            'ATIVO' => $inativo,
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
