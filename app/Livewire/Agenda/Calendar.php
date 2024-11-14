<?php

namespace App\Livewire\Agenda;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Calendar extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.agenda.calendar');
    }
}
