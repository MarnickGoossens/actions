<?php

namespace App\Livewire\Admin;

use App\Http\Middleware\Teacher;
use App\Livewire\Forms\admin\ManageLessonForm;
use App\Livewire\Forms\admin\TeacherLessonForm;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;use Livewire\Component;
use Livewire\WithPagination;

class ManageLessons extends Component
{
    use WithPagination;
    #[layout('layouts.krak-layout', ['title' => 'Lessen beheren', 'description' => 'Beheer de lessen van de cursussen', 'name' => 'Amber Vranckx'])]

    public $perPage = 10;
    public $showModal = false;
    public $showModalTeachers = false;
    public $search = null;
    public $orderBy = 'name';
    public $orderAsc = true;
    public $orderAscCourse = 'name';
    public $orderByCourse = true;
    public ManageLessonForm $form;
    public $loading = 'Laden ...';
    public $teachers = null;
    public TeacherLessonForm $formTeachers;
    public $lessonId;

    public function resort($column)
    {
        $this->orderBy === $column ?
            $this->orderAsc = !$this->orderAsc :
            $this->orderAsc = true;
        $this->orderBy = $column;
    }

    public function updateTeachers()
    {
        $this->teachers = null;
    }

    public function newLessonTeacher($id)
    {
        $this->lessonId = $id;
        $this->showModal = false;
        $this->formTeachers->reset();
        $this->resetErrorBag();
        $this->showModalTeachers = true;
    }

    public function createTeacherLesson()
    {
        $this->formTeachers->create($this->lessonId);
        $this->showModalTeachers = false;
        $user = User::findOrFail($this->formTeachers->user_id);
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "De leerkracht <b><i>{$user->first_name} {$user->sur_name}</i></b> is toegevoegd",
            'icon' => 'success',
        ]);
    }

    public function deleteTeacherLesson($teacher)
    {
        dd($teacher);
        $this->formTeachers->delete($teacher);
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "De leerkracht <b><i></i></b>is verwijderd voor de les",
            'icon' => 'success',
        ]);
    }

    public function newLesson(){
        $this->form->reset();
        $this->resetErrorBag();
        $this->showModal = true;
    }

    public function createLesson()
    {
        $this->form->create();
        $this->showModal = false;
        $course = Course::findOrFail($this->form->course_id);
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "De les <b><i>{$this->form->name}</i></b> van de cursus <b><i>{$course->name}</i></b> is toegevoegd",
            'icon' => 'success',
        ]);
    }

    public function editLesson(Lesson $lesson)
    {
        $this->teachers = $lesson->teachers;
        $this->resetErrorBag();
        $this->form->fill($lesson);
        $this->showModal = true;
    }

    public function updateLesson(Lesson $lesson)
    {
        $this->form->update($lesson);
        $this->showModal = false;
        $course = Course::findOrFail($this->form->course_id);
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "De les <b><i>{$this->form->name}</i></b> van de cursus <b><i>{$course->name}</i></b> is gewijzigd",
            'icon' => 'success',
        ]);
    }

    #[On('delete-lesson')]
    public function deleteLesson($id)
    {
        $lesson = Lesson::findOrFail($id);
        $course = Course::findOrFail($this->form->course_id);
        $this->form->delete($lesson);
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "De les <b><i>{$lesson->name}</i></b> van de cursus <b><i>{$course->name}</i></b> is verwijderd",
            'icon' => 'success',
        ]);
    }

    public function render()
    {
        $lessons = Lesson::with('teachers')->with('teachers.user')->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->where('name', 'like', "%{$this->search}%")
            ->paginate($this->perPage);
        $courses = Course::get();
        $users = User::get();
        return view('livewire.admin.manage-lessons',compact('lessons', 'courses', 'users'));
    }
}
