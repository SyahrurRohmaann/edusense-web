<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();

        User::factory()->create([
            'username' => 'adit', // Ganti 'name' dengan 'username'
            'email' => 'adit@gmail.com',
            'password' => bcrypt('1'), // Tambahkan password
            'role' => 'Admin', // Atau 'user', sesuai kebutuhan
        ]);

        // User::factory()->create([
        //     'username' => 'User', // Ganti 'name' dengan 'username'
        //     'email' => 'User@gmail.com',
        //     'password' => bcrypt('1'), // Tambahkan password
        //     'role' => 'User', // Atau 'user', sesuai kebutuhan
        // ]);
    }
}
