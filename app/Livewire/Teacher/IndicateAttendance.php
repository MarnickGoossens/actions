<?php

namespace App\Livewire\Teacher;

use App\Livewire\Forms\AttendanceForm;
use App\Models\Attendance;
use App\Models\AttendanceType;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Registration;
use Illuminate\Http\Request;
use League\Flysystem\StorageAttributes;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class IndicateAttendance extends Component
{


    use WithPagination;
    #[Layout('layouts.krak-layout', ['title' => 'Aanwezigheden', 'description' => 'Duid de aanwezigheden aan', 'name' => 'Amber Vranckx'])]


    #[Url]

    public $lesson_id;
    public $perPage = 10;
    public $attendanceTypeId = 1;

    public AttendanceForm $form;

    public function createAttendance($registrationId){
        $registration = Registration::findOrFail($registrationId);
        $this->form->create($registrationId, $this->attendanceTypeId, $this->lesson_id);
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "De aanwezigheden zijn geregistreerd",
            'icon' => 'success',
        ]);
    }

    public function editAttendance($registrationId)
    {
        $registration = Registration::findOrFail($registrationId);
        $attendance = Attendance::where('registration_id', '=', $registration->id)
            ->where('lesson_id', '=', $this->lesson_id)
            ->first();
        $this->resetErrorBag();
        if($attendance) {
            $this->attendanceTypeId = $attendance->attendance_type_id;
            $this->form->fill($attendance);
        }
        else {

                $this->attendanceTypeId = null;
        }

    }

    public function updateAttendance($attendanceId)
    {
        $attendance = Attendance::findOrFail($attendanceId);
        $this->form->update($attendance, $this->attendanceTypeId);
        $this->dispatch('swal:toast', [
            'background' => 'success',
            'html' => "De aanwezigheden zijn aangepast",
            'icon' => 'success',
        ]);
    }


    public function render()
    {
        $lesson = Lesson::findOrFail($this->lesson_id);
        $course_id = $lesson->course_id;
        $registrations = Registration::with('user')
            ->where('course_id' , '=', $course_id)
            ->paginate($this->perPage);


        //$registrations = Registration::with('user')->paginate($this->perPage);
        $attendancesTypes = AttendanceType::get();
        return view('livewire.teacher.indicate-attendance', compact('registrations', 'attendancesTypes'));
    }
}
