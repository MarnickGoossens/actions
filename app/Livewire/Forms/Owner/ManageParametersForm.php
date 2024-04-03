<?php

namespace App\Livewire\Forms\Owner;

use App\Models\Parameter;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ManageParametersForm extends Form
{
    public $id = null;
//    #[Validate('required|min:4|max:40|unique:parameters,key,id', as: 'the key')]
    public $key = null;
    #[Validate('required', as: 'value for this key')]
    public $value = null;

    // special validation rule for mb_id (unique:records,mb_id,id) for insert and update!
    public function rules()
    {
        return [
            'key' => "required|min:4|max:40|unique:parameters,key,{$this->id}",
        ];
    }

    // $validationAttributes is used to replace the attribute name in the error message
    protected $validationAttributes = [
        'mb_id' => 'the key',
    ];

    public function read($parameter)
    {
        $this->id = $parameter->id;
        $this->key = $parameter->key;
        $this->value = $parameter->value;
    }

    // create a new record
    public function create()
    {
        $this->validate();
        Parameter::create([
            'key' => $this->key,
            'value' => $this->value,
        ]);
    }

    // update the selected record
    public function update(Parameter $parameter) {
        $this->validate();
        $parameter->update([
            'key' => $this->key,
            'value' => $this->value,
        ]);
    }

    // delete the selected record
    public function delete(Parameter $parameter)
    {
        $parameter->delete();
    }
}
