<?php

namespace App\Livewire\Servicos;

use App\Livewire\Forms\Servico\ServicoForm;
use App\Models\Servico;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ServicosList extends Component
{
    use LivewireAlert, WithPagination;

    public ServicoForm $form;

    #PESQUISA
    public $search;

    #FILTROS DA TABELA
    public $sortField = 'ID';
    public $sortAsc = true;

     #FILTROS
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
        $servicos = Servico::select([
            'SERVICOS.*'
        ])
        
        ->when(!empty($this->search), function ($query) {
            $search = strtoupper($this->search);
            $search  = str_replace(" ", "%", $search);
            return $query->where($this->sortField, 'LIKE', "%$search%");
        })

        ->when($this->inativos, function ($query) {
            return $query->where('INATIVO', 'S');
        })

        ->orderBy($this->sortField, $this->sortAsc ? 'ASC' : 'DESC')
        ->paginate(5);

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
