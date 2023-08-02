<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Action::whereDoesntHave('action_variants')->get()->each(function ($action){
            \App\Models\ActionVariant::all()->each(function ($variant) use ($action){
                $action->action_variants()->attach($variant);
            });
        });
    }
}
