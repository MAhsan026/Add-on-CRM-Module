<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function registerUser(array $data)
    {
        // Validate the input data (assumed pre-validation in console/command controller)
        // Create a new user
        dd('hlo');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
