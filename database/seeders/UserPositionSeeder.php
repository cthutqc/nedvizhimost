<?php

namespace Database\Seeders;

use App\Models\UserPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userPositions = ['Агент по продаже недвижимости'];

        foreach($userPositions as $userPosition)
        {
            UserPosition::create([
                'name' => $userPosition,
            ]);
        }
    }
}
