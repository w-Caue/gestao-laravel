<?php

namespace App\Livewire\Auth\Ecommerce;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    #[Layout('layouts.ecommerce.app')]
    public function render()
    {
        return view('livewire.auth.ecommerce.login');
    }
}
