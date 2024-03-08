<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create a admin
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        $user->assignRole('admin');


        // Create a user
        $user = User::create([
            'name' => 'client',
            'email' => 'client@gmail.com',
            'password' => Hash::make('client'),
        ]);
        $user->assignRole('client');

        // Create a user
        $user = User::create([
            'name' => 'organizer',
            'email' => 'organizer@gmail.com',
            'password' => Hash::make('organizer'),
        ]);
        $user->assignRole('organizer');
    }
}
