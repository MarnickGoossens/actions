<?php

namespace App\Livewire\Teacher;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Teacher;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ViewClass extends Component
{
    #[Layout('layouts.krak-layout', ['title' => 'Klaslijsten', 'description' => 'Bekijk de klassen', 'name' => 'Amber Vranckx'])]

    public $orderBy = 'name';
    public $orderAsc = true;
    public $date = null;
    public $Perpage = 10;
    public $loading = 'Laden...';

    Use WithPagination;

    public function resort($column)
    {
        $this->orderBy === $column ?
            $this->orderAsc = !$this->orderAsc :
            $this->orderAsc = true;
        $this->orderBy = $column;
    }

    public function render()
    {
//        $query = Lesson::with(['course' => function($query) {
//            $query->orderBy('name', 'desc');
//        }])
//            ->with('teachers')
//            ->with('teachers.user');

        $query = Lesson::with('course')->with('teachers')->with('teachers.user')
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc');


        if($this->date != null){
            $query->where('date', '=', $this->date);
        }

        $lessons = $query->paginate($this->Perpage);

        return view('livewire.teacher.view-class', compact('lessons'));
    }
}
