<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
                [
                    'name' => 'О компании',
                    'slug' => 'about',
                ],
                [
                    'name' => 'Сотрудники',
                    'slug' => 'employees'
                ],
                [
                    'name' => 'Вакансии',
                    'slug' => 'vacancy'
                ],
                [
                    'name' => 'Контакты',
                    'slug' => 'contacts'
                ],
                [
                    'name' => 'Услуги',
                    'slug' => 'services'
                ],
            ];

        foreach($pages as $page){
            if(!Page::where('name', $page)->exists())
            {
                Page::create([
                    'name' => $page['name'],
                    'slug' => $page['slug'] ?? null,
                ]);
            }
        }
    }
}
