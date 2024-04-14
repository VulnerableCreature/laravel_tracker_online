<?php

namespace Database\Seeders;

use App\Models\DivisionUser;
use Illuminate\Database\Seeder;

class DivisionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DivisionUser::query()->create([
            'user_id' => 1,
            'division_id' => 1,
        ]);

        DivisionUser::query()->create([
            'user_id' => 3,
            'division_id' => 2,
        ]);

        DivisionUser::query()->create([
            'user_id' => 2,
            'division_id' => 3,
        ]);
    }
}
