<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function attendanceType()
    {
        return $this->belongsTo(AttendanceType::class)->withDefault();
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class)->withDefault();
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class)->withDefault();
    }

}
