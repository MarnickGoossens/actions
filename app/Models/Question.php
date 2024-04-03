<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function questionType()
    {
        return $this->belongsTo(QuestionType::class)->withDefault();
    }

    public function feedbackQuestions()
    {
        return $this->hasMany(FeedbackQuestion::class);
    }

//    public function valid_from(): Attribute
//    {
//        return Attribute::make(
//            get: fn($value) => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('m/d/Y')
//        );
//    }
protected $casts = ['valid_from' => 'date:Y-m-d'];
}
