<?php

namespace App\Livewire\Forms\Admin;

use App\Models\Question;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ManageQuestionsForm extends Form
{
    public $id = null;
    public $content = null;
    #[Validate('required', as: 'type')]
    public $question_type_id = null;
//    #[Validate('required', as: 'valid from for this question')]
    public $valid_from = null;
    #[Validate('required', as: 'geldig tot')]
    public $valid_until = null;

    public function rules()
    {
        return [
            'content' => "required|min:4|unique:questions,content,{$this->id}",
            'valid_from' => ['required', 'date', function ($attribute, $value, $fail) {
                if ($value >= $this->valid_until) {
                    $fail('geldig van moet eerder zijn dan geldig tot.');
                }
            }],
        ];
    }

    // $validationAttributes is used to replace the attribute name in the error message
    protected $validationAttributes = [
        'content' => 'deze vraag',
        'valid_from' => 'geldig van',
    ];

//    public function read($question)
//    {
//        $this->id = $question->id;
//        $this->content = $question->content;
//        $this->type = $question->type;
//        $this->validFrom = $question->validFrom;
//    }

    public function create()
    {
        $this->validate();
        Question::create([
            'content' => $this->content,
            'question_type_id' => $this->question_type_id,
            'valid_from' => $this->valid_from,
            'valid_until' => $this->valid_until,
        ]);
    }

    public function update(Question $question) {
        $this->validate();
        $question->update([
            'content' => $this->content,
            'question_type_id' => $this->question_type_id,
            'valid_from' => $this->valid_from,
            'valid_until' => $this->valid_until,
        ]);
    }

    // delete the selected record
    public function delete(Question $question)
    {
        $question->delete();
    }
}
