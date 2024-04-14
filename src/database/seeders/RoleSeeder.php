<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::query()->create([
            'title' => 'Администратор'
        ]);

        Role::query()->create([
            'title' => 'Смотрящий'
        ]);

        Role::query()->create([
            'title' => 'Участник'
        ]);
    }
}
