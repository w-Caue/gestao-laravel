<?php

namespace App\Livewire\Servicos;

use App\Livewire\Forms\Servico\ServicoForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ServicosRegister extends Component
{
    use LivewireAlert;

    public ServicoForm $form;

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

        return $this->alert('success', 'Serviço ' . $this->form->codigo . ' atualizado!', [
            'position' => 'center',
            'timer' => '5000',
            'toast' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.servicos.servicos-register');
    }
}
