<?php

namespace App\Livewire\Clientes;

use App\Livewire\Forms\Cliente\ClienteForm;
use App\Models\Cliente;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ClientesList extends Component
{
    use LivewireAlert;

    public ClienteForm $form;

    public function dados() {
        $clientes = Cliente::select([
            'clientes.*'
        ])->get();

        return $clientes;
    }

    public function save()
    {
        $this->form->save();

        $this->dispatch('close-modal');

        return $this->alert('success', 'Cliente ' . $this->form->codigo . ' cadastrado!', [
            'position' => 'center',
            'timer' => '5000',
            'toast' => true,
        ]);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.clientes.clientes-list', [
            'clientes' => $this->dados(),
        ]);
    }
}
