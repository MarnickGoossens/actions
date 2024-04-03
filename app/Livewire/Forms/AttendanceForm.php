<?php

namespace App\Livewire\Forms;

use App\Models\Attendance;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AttendanceForm extends Form
{
    public $id = null;

    #[Validate('required|exists:registrations,id', as: 'registratie')]
    public $registration_id;
    #[Validate('required|exists:attendance_types,id', as: 'aanwezigheidstype')]
    public $attendanceTypeId;
    #[Validate('required|exists:lessons,id', as: 'les')]
    public $lesson_id;

    public function create($registration, $attendanceTypeId, $lessonId)
    {
        $this->registration_id = $registration;
        $this->lesson_id = $lessonId;
        $this->attendanceTypeId = $attendanceTypeId;
        $this->validate();
        Attendance::create([
            'registration_id' => $this->registration_id,
            'attendance_type_id' => $this->attendanceTypeId,
            'lesson_id' => $this->lesson_id
        ]);
    }

    public function update(Attendance $attendance, $attendanceType) {
        $this->attendanceTypeId = $attendanceType;
        $this->validate();
        $attendance->update([
            'attendance_type_id' => $this->attendanceTypeId
        ]);
    }
}
