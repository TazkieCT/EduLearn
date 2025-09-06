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
            'email'          => 'tazkie@example.com',
            'role'           => 'student',
            'password'       => Hash::make('password'),
        ]);

        // Tambahan user dummy
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'id'             => (string) Str::uuid(),
                'first_name'     => 'User',
                'last_name'      => "Dummy{$i}",
                'gender'         => $i % 2 === 0 ? 'male' : 'female',
                'dob'            => '1995-01-01',
                'profile_image'  => null,
                'address'        => "Alamat Dummy {$i}",
                'city'           => 'Bandung',
                'country'        => 'Indonesia',
                'zip'            => '40123',
                'place_of_birth' => 'Bandung',
                'status'         => 'active',
                'email'          => "dummy{$i}@gmail.com",
                'role'           => 'student',
                'password'       => Hash::make('password'),
            ]);
        }
    }
}
