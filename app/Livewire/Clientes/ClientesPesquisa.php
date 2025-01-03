<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class ClientesPesquisa extends Component
{
    #PESQUISA
    public $search;

    #FILTROS DA TABELA
    public $sortField = 'ID';
    public $sortAsc = true;

    public $listeners = [
        'dados' => 'dados',
        'setClientes' => 'setClientes',
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function setClientes()
    {
        $this->dispatch('open-large-modal');
    }

    public function dados()
    {
        $clientes = Cliente::select([
            'CLIENTES.*'
        ])
            ->when(!empty($this->search), function ($query) {
                $search = strtoupper($this->search);
                $search  = str_replace(" ", "%", $search);
                return $query->where($this->sortField, 'LIKE', "%$search%");
            })

            // ->when($this->favoritos, function ($query) {
            //     return $query->where('FAVORITO', 'S');
            // })

            // ->when($this->inativos, function ($query) {
            //     return $query->where('INATIVO', 'S');
            // })

            // ->orderBy($this->sortField, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate(5);

        return $clientes;
    }

    public function render()
    {
        return view('livewire.clientes.clientes-pesquisa', ['clientes' => $this->dados()]);
    }
}
