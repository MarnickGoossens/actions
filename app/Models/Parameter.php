<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopeSearchKeyOrValue($query, $search = '%')
    {
        return $query->where('key', 'like', "%{$search}%")
            ->orWhere('value', 'like', "%{$search}%");
    }
}
