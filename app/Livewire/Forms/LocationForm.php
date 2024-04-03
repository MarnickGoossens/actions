<?php

namespace App\Livewire\Forms;

use App\Models\Location;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LocationForm extends Form
{
    public $id = null;
    public $name = null;
    public $street_name = null;
    public $house_number = null;
    public $city_id = null;

    // create a new record
    public function create()
    {
        Location::create([
            'name' => $this->name,
            'street_name' => $this->street_name,
            'house_number' => $this->house_number,
            'city_id' => $this->city_id
        ]);
    }

    public function update(Location $location) {
        $location->update([
            'name' => $this->name,
            'street_name' => $this->street_name,
            'house_number' => $this->house_number,
            'city_id' => $this->city_id
        ]);
    }

    // delete the selected record
    public function delete(Location $location)
    {
        $location->delete();
    }
}
