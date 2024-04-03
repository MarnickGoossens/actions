<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class)->withDefault();
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
