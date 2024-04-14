<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Division::query()->create([
            'title' => 'Административный персонал'
        ]);

        Division::query()->create([
            'title' => 'Вспомогательный персонал'
        ]);

        Division::query()->create([
            'title' => 'Технический персонал'
        ]);

        Division::query()->create([
            'title' => 'Б-12'
        ]);

        Division::query()->create([
            'title' => 'Бух-11'
        ]);

        Division::query()->create([
            'title' => 'Т-13'
        ]);
    }
}
