<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTargetAudience extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function course()
    {
        return $this->belongsTo(Course::class)->withDefault();
    }

    public function targetAudience()
    {
        return $this->belongsTo(TargetAudience::class)->withDefault();
    }
}
