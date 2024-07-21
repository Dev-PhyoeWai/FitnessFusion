<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123123'),
        ]);
        $admin->assignRole('admin');

        $editor = User::create([
            'name' => 'Trainer',
            'email' => 'trainer@gmail.com',
            'password' => Hash::make('trainer123123'),
        ]);
        $editor->assignRole('trainer');
    }
}
