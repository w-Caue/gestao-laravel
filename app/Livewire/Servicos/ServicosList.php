<?php

namespace App\Livewire\Servicos;

use App\Livewire\Forms\Servico\ServicoForm;
use App\Models\Servico;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ServicosList extends Component
{
    use LivewireAlert;

    public ServicoForm $form;

    public function dados(){
        $servicos = Servico::select([
            'servicos.*'
        ])->get();

        return $servicos;
    }

    public function save()
    {
        $this->form->save();

        $this->dispatch('close-modal-medium');

        return $this->alert('success', 'Serviço ' . $this->form->codigo . ' cadastrado!', [
            'position' => 'center',
            'timer' => '5000',
            'toast' => true,
        ]);
    }
    
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.servicos.servicos-list', [
            'servicos' => $this->dados()
        ]);
    }
}
