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
        $pages = ['О компании', 'Вакансии', 'Контакты'];

        foreach($pages as $page){
            if(!Page::where('name', $page)->exists())
            {
                Page::create([
                    'name' => $page
                ]);
            }
        }
    }
}
