<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Новостройки',
            'Вторичка',
            'Загородная',
            'Коммерческая'
        ];

        foreach ($categories as $category)
        {
            if(!Category::where('name', $category)->exists())
            {
                Category::create([
                    'name' => $category
                ]);
            }
        }
    }
}
