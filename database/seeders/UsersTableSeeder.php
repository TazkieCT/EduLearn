<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // User utama
        User::create([
            'id'             => (string) Str::uuid(),
            'first_name'     => 'Tazkie',
            'last_name'      => 'CT',
            'gender'         => 'male',
            'dob'            => '2000-01-01',
            'profile_image'  => null,
            'address'        => 'Jl. Laravel No. 123',
            'city'           => 'Jakarta',
            'country'        => 'Indonesia',
            'zip'            => '12345',
            'place_of_birth' => 'Jakarta',
            'status'         => 'active',
            'email'          => 'innerjtct@gmail.com',
            'role'           => 'student',
            'password'       => Hash::make('test1234'),
        ]);
    }
}
