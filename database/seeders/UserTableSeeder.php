<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
           'name' => 'mike',
           'email' => 'mike123@gmail.com',
            'password' => Hash::make('mike123'),
        ]);
        $admin->assignRole('admin');

        $editor = User::create([
            'name' => 'smith',
            'email' => 'smith123@gmail.com',
            'password' => Hash::make('smith123'),
        ]);
        $editor->assignRole('editor');
    }
}
