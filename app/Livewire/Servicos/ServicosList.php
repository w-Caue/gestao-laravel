<?php

namespace App\Livewire\Servicos;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ServicosList extends Component
{
    
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.servicos.servicos-list');
    }
}
