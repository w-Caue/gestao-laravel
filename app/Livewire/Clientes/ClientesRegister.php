<?php

namespace App\Livewire\Clientes;

use App\Livewire\Forms\Cliente\ClienteForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ClientesRegister extends Component
{
    use LivewireAlert;

    public ClienteForm $form;

    public $listeners = [
        'consulta' => 'consulta',
    ];

    public function consulta($codigo)
    {
        $this->form->show($codigo);
    }

    public function update()
    {
        $this->form->update();

        $this->dispatch('close-modal-large');

        $this->js('window.location.reload()');

        return $this->alert('success', 'Cliente ' . $this->form->codigo . ' atualizado!', [
            'position' => 'center',
            'timer' => '5000',
            'toast' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.clientes.clientes-register');
    }
}
