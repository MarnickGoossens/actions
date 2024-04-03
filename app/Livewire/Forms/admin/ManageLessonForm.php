<?php

namespace App\Livewire\Forms\admin;

use App\Models\Lesson;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ManageLessonForm extends Form
{
    public $id = null;
    #[Validate('required|exists:courses,id', as: 'cursus')]
    public $course_id = null;
    #[Validate('required', as: 'naam van de les')]
    public $name = null;
    #[Validate('required|numeric', as: 'duur')]
    public $duration = null;
    #[Validate('required|date', as: 'datum')]
    public $date = null;

    // read the selected lesson
    public function read($lesson)
    {
        $this->id = $lesson->id;
        $this->course_id = $lesson->course_id;
        $this->name = $lesson->name;
        $this->duration = $lesson->duration;
        $this->date = $lesson->date;
    }

    // create a new lesson
    public function create()
    {
        $this->validate();
        Lesson::create([
            'course_id' => $this->course_id,
            'name' => $this->name,
            'duration' => $this->duration,
            'date' => $this->date
        ]);
    }

    // update the selected lesson
    public function update(Lesson $lesson) {
        $this->validate();
        $lesson->update([
            'course_id' => $this->course_id,
            'name' => $this->name,
            'duration' => $this->duration,
            'date' => $this->date
        ]);
    }

    // delete the selected lesson
    public function delete(Lesson $lesson)
    {
        $lesson->delete();
    }
}
