<?php

namespace App\Livewire\Forms\admin;

use App\Models\Teacher;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TeacherLessonForm extends Form
{
    public $id = null;
    #[Validate('required|exists:users,id', as: 'Leerkracht')]
    public $user_id = null;
    #[Validate('required|exists:lessons,id', as: 'Les')]
    public $lesson_id = null;

    // create a new teacherLesson
    public function create($lessonId)
    {
        $this->lesson_id = $lessonId;
        $this->validate();
        Teacher::create([
            'lesson_id' => $this->lesson_id,
            'user_id' => $this->user_id,
        ]);
    }

    // delete the selected teacherLesson
    public function delete(Teacher $teacher)
    {
        $teacher->delete();
    }
}
