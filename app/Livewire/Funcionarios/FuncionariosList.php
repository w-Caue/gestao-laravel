<?php

namespace App\Livewire\Funcionarios;

use App\Livewire\Forms\Funcionario\FuncionarioForm;
use App\Models\Funcionario;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class FuncionariosList extends Component
{
    use LivewireAlert, WithPagination;

    public FuncionarioForm $form;

    #PESQUISA
    public $search;

    #FILTROS DA TABELA
    public $sortField = 'ID';
    public $sortAsc = true;

    #FILTROS
    public $ativos;

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
        $funcionarios = Funcionario::select([
            'FUNCIONARIOS.*'
        ])
            ->when(!empty($this->search), function ($query) {
                $search = strtoupper($this->search);
                $search  = str_replace(" ", "%", $search);
                return $query->where($this->sortField, 'LIKE', "%$search%");
            })

            // ->when($this->ativos, function ($query) {
            //     return $query->where('INATIVO', 'S');
            // })

            ->orderBy($this->sortField, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate(5);

        return $funcionarios;
    }

    public function save()
    {
        $this->form->save();

        $this->dispatch('close-modal-medium');

        return $this->alert('success', 'Funcionário ' . $this->form->codigo . ' cadastrado!', [
            'position' => 'center',
            'timer' => '3000',
            'toast' => false,
        ]);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.funcionarios.funcionarios-list', [
            'funcionarios' => $this->dados(),
        ]);
    }
}
