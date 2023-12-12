<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\Cpf;
use Illuminate\Support\Carbon;
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
        $minBirthdate = now()->subYears(18)->format('Y-m-d');

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'birthdate' => ['required', "before_or_equal:{$minBirthdate}"],
            'cpf' => ['required', new Cpf],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'birthdate' => Carbon::parse($input['birthdate'])->format('Y-m-d'),
            'cpf' => preg_replace('/\D/', '', $input['cpf']),
        ]);
    }
}
