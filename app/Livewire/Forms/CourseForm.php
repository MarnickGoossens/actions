<?php

namespace App\Livewire\Forms;

use App\Models\Course;
use Livewire\Attributes\Validate;
use Livewire\Form;



class CourseForm extends Form
{
    public $id = null;

    #[Validate('required', as: 'name of the course')]
    public $course = null;
    #[Validate('required|numeric', as: 'location for this course')]
    public $location_id = null;
    #[Validate('required|numeric|min:0', as: 'price')]
    public $price = null;
    #[Validate('required|exists:lessons,id', as: 'lesson')]
    public $lesson_id = null;

    #[Validate('required|exists:teachers,id', as: 'teacher')]
    public $teacher_id = null;

    #[Validate('required', as: 'date of the course')]
    public $date = null;

    #[Validate('required', as: 'description of the course')]
    public $description = null;

    #[Validate('required|numeric', as: 'max number of students for this course')]
    public $max_number = null;


    public function read($course)
    {
        $this->id = $course->id;
        $this->course = $course->name;
        $this->location_id = $course->location_id;
        $this->price = $course->prices->price;
        $this->lesson_id = $course->lesson_id;
        $this->teacher_id = $course->teacher_id;
        $this->date = $course->date;
        $this->description = $course->description;
        $this->max_number = $course->max_number;



    }

    public function create()
    {
        $this->validate();
        Course::create([
            'name' => $this->course,
            'location_id' => $this->location_id,
            'price' => $this->price,
            'lesson_id' => $this->lesson_id,
            'teacher_id' => $this->teacher_id,
            'date' => $this->date,
            'description' => $this->description,
            'max_number' => $this->max_number,


        ]);
    }

    public function update(Course $course) {
        $this->validate();
        $course->update([
            'name' => $this->course,
            'location_id' => $this->location_id,
            'price' => $this->price,
            'lesson_id' => $this->lesson_id,
            'teacher_id' => $this->teacher_id,
            'date' => $this->date,
            'description' => $this->description,
            'max_number' => $this->max_number,



        ]);
    }

    public function delete(Course $course)
    {
        $course->delete();
    }
}
