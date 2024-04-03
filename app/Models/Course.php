<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class)->withDefault();
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function courseTargetAudiences()
    {
        return $this->hasMany(CourseTargetAudience::class);
    }
}
