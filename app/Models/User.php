<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'sur_name',
        'house_number',
        'street_name',
        'telephone_number',
        'city_id',
        'type_id',
        'gender_id',
        'birthdate',
        'email',
        'password',
        'active',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */

    public function scopeSearch($query, $search = '%')
    {
        return $query->where('first_name', 'like', "%{$search}%")
            ->orWhere('sur_name', 'like', "%{$search}%");
    }
    protected $appends = [
        'profile_photo_url',
    ];

    public function remarkChilds(){
        return $this->hasMany(Remark::class, foreignKey: 'child_id', localKey: 'id');
    }

    public function remarkRemarkers(){
        return $this->hasMany(Remark::class, foreignKey: 'remarker_id', localKey: 'id');
    }


    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function type()
    {
        return $this->belongsTo(Type::class)->withDefault();
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class)->withDefault();
    }

    public function city()
    {
        return $this->belongsTo(City::class)->withDefault();
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
