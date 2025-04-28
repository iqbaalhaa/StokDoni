<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::create([
            'email' => 'admin@gmail.com',
            'nama' => 'Riddick V.20',
            'password' => bcrypt('password')
        ]);
    }
}
