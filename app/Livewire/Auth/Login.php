<?php

namespace App\Livewire\Auth;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;

    #[Validate('required')]
    public $usuario;

    #[Validate('required')]
    public $senha;

    public function login(){

    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
