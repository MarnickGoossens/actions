<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use App\Models\Payment;
use App\Models\Registration;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ManagePayments extends Component
{
    use WithPagination;

    public $search;
    public $active = true;
    public $loading = 'Please wait...';
    public $perPage = 10;

    #[Layout('layouts.krak-layout', ['title' => 'Betalingen Bekijken', 'description' => 'Betalingen Beheren', 'name' => 'Marnick Goossens'])]
    public function render()
    {
        $allUsers = User::has('registrations')->withCount('registrations')->get();
        $allCourses = Course::has('registrations')->withCount('registrations')->get();
        $allRegistrations = Registration::has('payments')->withCount('payments')->get();
        $allPayments = Payment::orderBy('date')
            ->whereHas('registration', function ($query) {
                $query->where('structured_message', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('registration', function ($query1) {
                $query1->whereHas('user', function ($query2) {
                    $query2->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('sur_name', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate($this->perPage);
        return view('livewire.admin.manage-payments', compact('allPayments', 'allRegistrations', 'allUsers', 'allCourses'));
    }
}
