<?php

namespace App\Livewire\Auth\Ecommerce;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;

    public $view = 1;

    #[Validate('required|email')]
    public $email;

    #[Validate('required')]
    public $nome;

    #[Validate('required')]
    public $senha;

    public function login()
    {
        // $this->validate();

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            return $this->view = 3;
        }

        $this->view = 4;

        return;
    }

    public function save()
    {
        // $this->validate();

        $user = User::create([
            'name' => $this->nome,
            'email' => $this->email,
            'password' => Hash::make($this->senha),
        ]);

        if ($user->save()) {
            Auth::guard('web')->login($user, false);

            return $this->alert('success', 'Conta cadastrada!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
            ]);
        }
    }

    #[Layout('layouts.ecommerce.app')]
    public function render()
    {
        return view('livewire.auth.ecommerce.login');
    }
}
