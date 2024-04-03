<?php

namespace App\Actions\Fortify;

use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'sur_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'street_name' => ['required', 'string', 'max:400'],
            'house_number' => ['required', 'integer'],
            'birthdate' => ['required', 'date'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'sur_name' => $input['sur_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'gender_id' => 1, // Moet later nog gefixt worden
            'city_id' => 1, // Moet later nog gefixt worden
            'type_id' => 1, // We zeggen dat alle nieuwe users ouders zijn by default
            'telephone_number' => $input['telephone_number'],
            'street_name' => $input['street_name'],
            'house_number' => $input['house_number'],
            'birthdate' => $input['birthdate'],
        ]);
    }
}
