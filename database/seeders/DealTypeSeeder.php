<?php

namespace Database\Seeders;

use App\Models\DealType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dealTypes = ['Прямая продажа', 'Свободная продажа', 'Альтернатива'];

        foreach($dealTypes as $dealType)
        {
            DealType::create([
                'name' => $dealType
            ]);
        }
    }
}
