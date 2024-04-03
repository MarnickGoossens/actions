<?php

namespace App\Livewire\Owner;

use App\Livewire\Forms\LocationForm;
use App\Models\City;
use App\Models\Location;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Locations extends Component
{
    public $search;
    public $active = true;
    public $loading = 'Please wait...';
    public $perPage = 10;

    public $showModal = false;
    public $showConfirmation = false;
    public LocationForm $form;

    public function newLocation()
    {
        $this->form->reset();
        $this->resetErrorBag();
        $this->showModal = true;
    }

    public function createLocation()
    {
        $this->form->create();
        $this->showModal = false;
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "De locatie <b><i>{$this->form->name}</i></b> is aangemaakt!",
            'icon' => 'success',
        ]);
    }

    public function updateLocation(Location $location)
    {
        $this->form->update($location);
        $this->showModal = false;
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "The location <b><i>{$this->form->name} {$this->form->street_name} {$this->form->house_number}</i></b> has been updated",
            'icon' => 'success',
        ]);
    }

    public function editLocation(Location $location)
    {
        $this->resetErrorBag();
        $this->form->fill($location);
        $this->showModal = true;
    }

    public function confirmation (Location $location)
    {
        $this->form->reset();
        $this->form->fill($location);
        $this->resetErrorBag();
        $this->showConfirmation = true;
    }

    public function deleteRecord(Location $location)
    {
        $this->form->delete($location);
        $this->showConfirmation = false;
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "The location <b><i>{$location->name}</i></b> has been deleted",
            'icon' => 'success',
        ]);
    }

    #[Layout('layouts.krak-layout', ['title' => 'Locaties Beheren', 'description' => 'Locaties Beheren', 'name' => 'Marnick Goossens'])]
    public function render()
    {
        $allCities = City::has('locations')->withCount('locations')->get();
        $query = Location::orderBy('name')
            ->SearchNameOrStreetName($this->search);
        if($this->active)
            $query->where('active', true);
        $locations = $query
            ->paginate($this->perPage);
        return view('livewire.owner.locations', compact('allCities', 'locations'));
    }
}
