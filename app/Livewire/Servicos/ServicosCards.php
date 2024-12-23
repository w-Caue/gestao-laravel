<?php

namespace App\Livewire\Servicos;

use App\Models\Servico;
use Livewire\Component;

class ServicosCards extends Component
{
    public $total;
    public $novos;
    public $favoritos;
    public $inativos;

    public function consultas()
    {
        $this->total = Servico::get('ID')->count();

        $mes = date('m');

        $this->inativos = Servico::where('INATIVO', 'S')->count();
    }

    public function render()
    {
        $this->consultas();
        return view('livewire.servicos.servicos-cards');
    }
}
