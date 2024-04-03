<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public $id = null;
    public $first_name = null;
    public $sur_name = null;
    public $telephone_number = null;
    public $street_name = null;
    public $house_number = null;
    public $mail = null;
    public $password = null;
    public $birthdate = null;
    public $active = null;
    #[Validate('required|exists:genders,id', as: 'gender')]
    public $gender_id = null;
    #[Validate('required|exists:cities,id', as: 'city')]
    public $city_id = null;
    #[Validate('required|exists:types,id', as: 'type')]
    public $type_id = null;

    // read the selected record
    public function read($user)
    {
        $this->id = $user->id;
        $this->first_name = $user->first_name;
        $this->sur_name = $user->sur_name;
        $this->telephone_number = $user->telephone_number;
        $this->street_name = $user->street_name;
        $this->house_number = $user->house_number;
        $this->mail = $user->mail;
        $this->password = $user->password;
        $this->birthdate = $user->birthdate;
        $this->active = $user->active;
        $this->gender_id = $user->gender_id;
        $this->city_id = $user->city_id;
        $this->type_id = $user->type_id;
    }

    // create a new record
    public function create()
    {
        $this->validate();
        User::create([
            'first_name' => $this->first_name,
            'sur_name' => $this->sur_name,
            'telephone_number' => $this->telephone_number,
            'street_name' => $this->street_name,
            'house_number' => $this->house_number,
            'mail' => $this->mail,
            'password' => $this->password,
            'birthdate' => $this->birthdate,
            'gender_id' => $this->gender_id,
            'city_id' => $this->city_id,
            'type_id' => $this->type_id,
        ]);
    }

    // update the selected record
    public function update(User $user) {
        $this->validate();
        $user->update([
            'first_name' => $this->first_name,
            'sur_name' => $this->sur_name,
            'telephone_number' => $this->telephone_number,
            'street_name' => $this->street_name,
            'house_number' => $this->house_number,
            'mail' => $this->mail,
            'password' => $this->password,
            'birthdate' => $this->birthdate,
            'gender_id' => $this->gender_id,
            'city_id' => $this->city_id,
            'type_id' => $this->type_id,
        ]);
    }

    // delete the selected record
    public function delete(User $user)
    {
        $user->delete();
    }
}
