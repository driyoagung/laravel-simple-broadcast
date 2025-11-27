<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat user Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Buat user biasa
        User::create([
            'name' => 'Regular User',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);

        // // Buat beberapa user tambahan untuk testing broadcast
        // User::factory()->count(5)->create([
        //     'role' => 'user',
        // ]);

        $this->command->info('Users created successfully!');
        $this->command->info('Admin: admin@gmail.com / admin123');
        $this->command->info('User: user@gmail.com / user123');
    }
}