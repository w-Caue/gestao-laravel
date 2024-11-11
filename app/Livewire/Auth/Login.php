<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;

    #[Validate('required')]
    public $email;

    #[Validate('required')]
    public $senha;

    public function login()
    {
        $this->validate();

        $email = trim($this->email);
        $user = User::where('email', $email)
            // ->where('DELETADO', "=", 'N')
            ->first();

        if ($user == null) {
            return $this->alert('error', 'Usuário não encontrado.', [
                'position' => 'center',
                'text' => 'Verifique as credenciais de login.',
                'timer' => 3000,
                'toast' => false,
            ]);
        }

        $senhaCorreta = Hash::check($this->senha, $user->password);

        if (!$senhaCorreta) {
            return $this->alert('error', 'Senha incorreta!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
            ]);
        }

        Auth::login($user, false);
        return redirect()->route('admin.dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
