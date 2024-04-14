<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            'surname' => 'Admin',
            'name' => 'Admin',
            'middleName' => 'Admin',
            'login' => 'admin',
            'password' => Hash::make(123),
            'role_id' => 1,
        ]);

        User::query()->create([
            'surname' => 'Looking',
            'name' => 'Looking',
            'middleName' => 'Looking',
            'login' => 'look',
            'password' => Hash::make(123),
            'role_id' => 2,
        ]);

        User::query()->create([
            'surname' => 'Participant',
            'name' => 'Participant',
            'middleName' => 'Participant',
            'login' => 'part',
            'password' => Hash::make(123),
            'role_id' => 3,
        ]);

        User::factory(40)->create();
    }
}
