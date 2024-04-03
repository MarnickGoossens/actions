<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopeSearchNameOrStreetName($query, $search = '%')
    {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('street_name', 'like', "%{$search}%");
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class)->withDefault();
    }

}
