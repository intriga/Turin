<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Intriga',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);
        $admin->assignRole('admin'); // Assign admin role

        // Create guest user
        $guest = User::create([
            'name' => 'Guest User',
            'email' => 'guest@example.com',
            'password' => bcrypt('123456'), // Use a secure password
        ]);
        $guest->assignRole('guest'); // Assign guest role

        User::factory()->count(10)->create();
    }
}
