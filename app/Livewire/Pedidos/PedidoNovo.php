<?php

namespace App\Livewire\Pedidos;

use App\Models\Cliente;
use App\Models\Pedido;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PedidoNovo extends Component
{
    use LivewireAlert;

    public $codCliente;
    public $clientePedido;

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

        $this->clientePedido = Cliente::where('ID', $codigo)->get(['ID', 'NOME'])->first();

        $this->dispatch('close-modal-large');
    }

    public function params()
    {
        $this->listVendedor = Cliente::where('ATIVO', 'S')->where('TIPO', 'V')->get();
    }

    public function save()
    {
        dd($this->codCliente);

        $pedido = Pedido::create([
            'CLIENTE' => $this->clientePedido,
            'VENDEDOR' => $this->vendedor,
            'PAGAMENTO' => $this->pagamento,
            'STATUS' => 'ABERTO',
            'DATA_CADASTRO' => date('Y-m-d'),
        ]);

        if ($pedido->save()) {
            $this->dispatch('close-modal-medium');

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
