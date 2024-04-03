<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\Admin\ManageQuestionsForm;
use App\Models\Question;
use App\Models\QuestionType;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ManageQuestions extends Component
{
    use WithPagination;

    public $orderBy = 'content';
    public $orderAsc = true;
    public $perPage = 5;
    public ManageQuestionsForm $form;
    public $showModal = false;
    public $questionsType;
    public $search;

//    public $geslotenVraag = true;
//    public $openVraag = true;

    #[Layout('layouts.krak-layout', ['title' => 'Vragen beheren', 'description' => 'Vragen beheren', 'name' => 'Magomed-Ali Dudayev'])]

    public function updated($property, $value)
    {
        if (in_array($property, ['search']))
            $this->resetPage();
    }

    public function resort($column)
    {
        $this->orderBy === $column ?
            $this->orderAsc = !$this->orderAsc :
            $this->orderAsc = true;
        $this->orderBy = $column;
    }

    public function editQuestion(Question $question)
    {
        $this->resetErrorBag();
//        dump($question->toArray());
        $this->form->fill($question);
//        $this->form->valid_from = \Carbon\Carbon::parse($this->form->valid_from)->format('m-d-Y');
//        dump($this->form->toArray());
        $this->showModal = true;
    }

    public function updateQuestion(Question $question)
    {
        $this->form->update($question);
        $this->showModal = false;
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "This question has been updated",
            'icon' => 'success',
        ]);
    }

    public function newQuestion()
    {
        $this->form->reset();
        $this->resetErrorBag();
//        $this->reset($this->type);
        $this->showModal = true;
    }

    public function createQuestion()
    {
        $this->form->create();
        $this->showModal = false;
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "The question has been added",
            'icon' => 'success',
        ]);
    }

    #[On('delete-question-type')]
    public function deleteQuestion($id)
    {
        $question = Question::findOrFail($id);
        $this->form->delete($question);
        $this->dispatch('swal:toast', [
            'background' => 'danger',
            'html' => "The question has been deleted",
            'icon' => 'success',
        ]);
    }

    public function render()
    {
        $query = Question::orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
//            ->searchKeyOrValue($this->search)
            ->withCount('feedbackQuestions')
            ->where('content', 'like', "%{$this->search}%");

        if($this->questionsType == 'geslotenVraag')
        {
            $query = $query->where('question_type_id', 2);
        }
        elseif ($this->questionsType == 'openVraag')
        {
            $query = $query->where('question_type_id', 1);
        }

        $questions = $query
            ->paginate($this->perPage);

        $questionTypes = QuestionType::get();
        return view('livewire.admin.manage-questions', compact('questions', "questionTypes"));
    }
}
