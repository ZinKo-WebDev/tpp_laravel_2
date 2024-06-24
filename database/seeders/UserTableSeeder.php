<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{

    public function run(): void
    {
        $admin = User::create([
           'name' => 'admin123',
           'email' => 'admin123@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
        $admin->assignRole('admin');

        $editor = User::create([
            'name' => 'editor123',
            'email' => 'editor123@gmail.com',
            'password' => bcrypt('editor123'),
        ]);
        $editor->assignRole('editor');
    }
}
