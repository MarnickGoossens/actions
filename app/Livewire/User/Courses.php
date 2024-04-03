<?php

namespace App\Livewire\User;

use App\Livewire\Forms\CourseForm;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Location;
use App\Models\Teacher;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Courses extends Component
{
    // sort properties

    // filter and pagination
    public $search;
    public $showModal = false;

    public CourseForm $form;

    public $orderBy = 'name';
    public $orderAsc = true;

    #[Layout('layouts.krak-layout', ['title' => 'cursussen','name' => 'Niel'])]

    public function render()
    {


        $courses = Course::withCount('location')
            ->with('lessons')
            ->with('lessons.teachers')
            ->with('lessons.teachers.user')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->get();
        $teachers = Teacher::orderBy('id')->get();
        $locations = Location::orderBy('id')->get();
        $lessons = Lesson::orderBy('id')->get();
        return view('livewire.user.courses', compact('courses', 'teachers', 'locations', 'lessons'));



    }

    public function resort($column)
    {
        $this->orderBy === $column ?
            $this->orderAsc = !$this->orderAsc :
            $this->orderAsc = true;
        $this->orderBy = $column;
    }


    public function newCourse()
    {
        $this->form->reset();
        $this->resetErrorBag();
        $this->showModal = true;
    }

    public function createCourse()
    {
        $this->form->create();
        $this->showModal = false;
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "The course <b><i>{$this->form->course}</i></b> has been added",
            'icon' => 'success',
        ]);
    }


}
