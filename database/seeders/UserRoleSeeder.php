<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Role::where('name', 'admin')->exists())
            Role::create(['name' => 'admin']);

        if(!Role::where('name', 'manager')->exists())
            Role::create(['name' => 'manager']);

        if(!Role::where('name', 'user')->exists())
            Role::create(['name' => 'user']);

        $user = User::firstOrCreate(
            [
                'email' =>  'toserg81@mail.ru'
            ],
            [
                'name' => 'Sergey',
                'email' => 'toserg81@mail.ru',
                'password' => 'gfhjkmgfhjkm',
                'email_verified_at' => now(),
            ]
        );

        $user->assignRole('admin');

        User::factory()->count(10)->create()->each(function ($user){
            $user->assignRole('manager');
        });

        User::factory()->count(100)->create()->each(function ($user){
            $user->assignRole('user');
        });
    }
}
