<?php

namespace App\Livewire\Clientes;

use App\Livewire\Forms\Cliente\ClienteForm;
use App\Models\Cliente;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ClientesList extends Component
{
    use LivewireAlert, WithPagination;

    public ClienteForm $form;

    #PESQUISA
    public $search;

    #FILTROS DA TABELA
    public $sortField = 'ID';
    public $sortAsc = true;

    #FILTROS
    public $favoritos;
    public $inativos;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
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

            ->when($this->favoritos, function ($query) {
                return $query->where('favorito', 'S');
            })

            ->when($this->inativos, function ($query) {
                return $query->where('inativo', 'S');
            })

            ->orderBy($this->sortField, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate(5);

        return $clientes;
    }

    public function save()
    {
        $this->form->save();

        $this->dispatch('close-modal-medium');

        return $this->alert('success', 'Cliente ' . $this->form->codigo . ' cadastrado!', [
            'position' => 'center',
            'timer' => '3000',
            'toast' => false,
        ]);
    }

    public function setFavoritoList($codigo)
    {
        $this->form->setFavorito($codigo);

        if ($this->form->clienteFavorito == 'S') {
            return $this->alert('success', 'Cliente ' . $codigo . ' é favorito!', [
                'position' => 'center',
                'timer' => '3000',
                'toast' => true,
            ]);
        }

        return $this->alert('warning', 'Cliente ' . $codigo . ' não é favorito!', [
            'position' => 'center',
            'timer' => '3000',
            'toast' => true,
        ]);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.clientes.clientes-list', [
            'clientes' => $this->dados(),
        ]);
    }
}
