<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function child()
    {
        return $this->belongsTo(User::class, foreignKey: 'child_id', ownerKey: 'id')->withDefault();
    }

    public function remarker()
    {
        return $this->belongsTo(User::class, foreignKey: 'remarker_id', ownerKey: 'id')->withDefault();
    }
}
