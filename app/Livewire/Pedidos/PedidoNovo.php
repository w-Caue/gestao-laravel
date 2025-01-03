<?php

namespace App\Livewire\Pedidos;

use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Pedido;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PedidoNovo extends Component
{
    use LivewireAlert;

    public $codCliente;
    public $clientePedido;
    public $cliente;

    public $listVendedor;

    public $vendedor;
    public $pagamento;
    public $observacao;

    public $listeners = [
        'setClientePedido' => 'setClientePedido',
    ];

    public function mount()
    {
        $this->params();
    }

    public function setClientePedido($codigo)
    {
        $this->codCliente = $codigo;

        $cliente = Cliente::where('ID', $codigo)->get(['ID', 'NOME'])->first();

        if (!$cliente) {
            return $this->alert('error', 'Cliente não encontrado!', [
                'position' => 'center',
                'timer' => '3000',
                'toast' => true,
            ]);
        }

        $this->params();

        $this->dispatch('close-modal-large');

        $this->clientePedido = $cliente->NOME;

        return $this->cliente = $cliente->ID;
    }

    public function params()
    {
        $vendedores = Funcionario::where('ATIVO', 'S')->where('TIPO', 'V')->get();

        return $this->listVendedor = $vendedores;
    }

    public function searchCliente()
    {
        $cliente = Cliente::where('ID', $this->clientePedido)->get(['ID', 'NOME'])->first();

        if (!$cliente) {
            $this->clientePedido = '';

            return $this->alert('error', 'Cliente não encontrado!', [
                'position' => 'center',
                'timer' => '3000',
                'toast' => true,
            ]);
        }

        $this->params();

        $this->clientePedido = $cliente->NOME;

        return $this->cliente = $cliente->ID;
    }

    public function save()
    {
        $pedido = Pedido::create([
            'CLIENTE' => $this->cliente,
            'VENDEDOR' => $this->vendedor,
            'PAGAMENTO' => $this->pagamento,
            'STATUS' => 'ABERTO',
            'OBSERVACAO' => strtoupper($this->observacao),
            'DATA_CADASTRO' => date('Y-m-d'),
        ]);

        if ($pedido->save()) {
            $this->dispatch('close-modal-small');

            return $this->alert('success', 'Pedido Criado!', [
                'position' => 'center',
                'timer' => '3000',
                'toast' => false,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pedidos.pedido-novo');
    }
}
