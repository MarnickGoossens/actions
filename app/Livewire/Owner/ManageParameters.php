<?php

namespace App\Livewire\Owner;

use App\Livewire\Forms\Owner\ManageParametersForm;
use App\Models\Parameter;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ManageParameters extends Component
{
    use WithPagination;

    public $orderBy = 'key';
    public $orderAsc = true;
    public $perPage = 10;
    public $search;
    public ManageParametersForm $form;
    public $showModal = false;

    #[Layout('layouts.krak-layout', ['title' => 'Manage Parameters', 'description' => 'Manage Parameters', 'name' => 'Magomed-Ali Dudayev'])]

    public function resort($column)
    {
        $this->orderBy === $column ?
            $this->orderAsc = !$this->orderAsc :
            $this->orderAsc = true;
        $this->orderBy = $column;
    }

    public function editParameter(Parameter $parameter)
    {
        $this->resetErrorBag();
        $this->form->fill($parameter);
        $this->showModal = true;
    }

    public function updateRecord(Parameter $parameter)
    {
        $this->form->update($parameter);
        $this->showModal = false;
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "The <b><i>{$this->form->key}</i></b> has been updated",
            'icon' => 'success',
        ]);
    }

    public function newParameter()
    {
        $this->form->reset();
        $this->resetErrorBag();
        $this->showModal = true;
    }

    public function createParameter()
    {
        $this->form->create();
        $this->showModal = false;
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "The record <b><i>{$this->form->key}</i></b> has been added",
            'icon' => 'success',
        ]);
    }

    #[On('delete-key')]
    public function deleteParameter($id)
    {
        $parameter = Parameter::findOrFail($id);
        $this->form->delete($parameter);
        $this->dispatch('swal:toast', [
            'background' => 'danger',
            'html' => "The parameter <b><i>{$parameter->key}</i></b> has been deleted",
            'icon' => 'success',
        ]);
    }

    public function render()
    {
        $parameters = Parameter::orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->searchKeyOrValue($this->search)
            ->paginate($this->perPage);
        return view('livewire.owner.Manage-parameters', compact('parameters'));
    }
}
