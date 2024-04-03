<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Accessors and mutators (method name is the attribute name)
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),         // accessor
//            set: fn($value) => strtolower($value),      // mutator
        );
    }
}
