<?php

namespace App\Livewire\Admin;

use App\Models\City;
use App\Models\Gender;
use App\Models\Type;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Livewire\Forms\UserForm;


class ManageUsers extends Component
{
    use WithPagination;

    // filter and pagination
    public $search;
    public $active = true;
    public $perPage = 5;
    public $showModal = false;

    public UserForm $form;


    // reset the paginator
    public function updated($propertyName, $propertyValue)
    {
        // reset if the $search, $noCover, $noStock or $perPage property has changed (updated)
        if (in_array($propertyName, ['search', 'active', 'perPage']))
            $this->resetPage();
    }

    public function newUser()
    {
        $this->form->reset();
        $this->resetErrorBag();
        $this->showModal = true;
    }

    public function createUser()
    {
        $this->form->create();
        $this->showModal = false;
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "The user <b><i>{$this->form->first_name} {$this->form->sur_name}</i></b> has been added",
            'icon' => 'success',
        ]);
    }

    public function editUser(User $user)
    {
        $this->resetErrorBag();
        $this->form->fill($user);
        $this->showModal = true;
    }

    public function updateUser(User $user)
    {
        $this->form->update($user);
        $this->showModal = false;
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "De gegevens van <b><i>{$this->form->first_name} {$this->form->sur_name}</i></b> zijn aangepast",
            'icon' => 'success',
        ]);
    }

    #[Layout('layouts.krak-layout', ['title' => 'Gebruikers beheren', 'description' => 'Beheer de gebruikers in de database',])]
    public function render()
    {
        $query = User::orderBy('id')
            ->search($this->search);

        if (!$this->active)
            $query->where('active', false);

        $users = $query
            ->paginate($this->perPage);

        $genders = Gender::orderBy('name')->get();
        $cities = City::orderBy('zipcode')->get();
        $types = Type::orderBy('name')->get();
        return view('livewire.admin.manage-users', compact('users','genders','cities','types'));
    }
}




