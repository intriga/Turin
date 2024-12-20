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
        // Example of creating a user and assigning a role
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@demo.com',
            'password' => bcrypt('123456'),
        ]);

        $admin->assignRole('admin');

        // $editor = User::create([
        //     'name' => 'Editor User',
        //     'email' => 'editor@demo.com',
        //     'password' => bcrypt('123456'),
        // ]);

        // $editor->assignRole('editor');

        // $guest = User::create([
        //     'name' => 'Guest User',
        //     'email' => 'guest@demo.com',
        //     'password' => bcrypt('123456'),
        // ]);

        // $guest->assignRole('guest');

        // User::factory()->count(10)->create();
    }
}
