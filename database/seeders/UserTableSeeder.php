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
        $admin=User::create([
            'name'=>'adminOne',
            'email'=>'adminOne@gmail.com',
            'password'=>Hash::make('adminOne123'),
        ]);
        $admin->assignRole('Admin');

        $editor=User::create([
            'name'=>'editorTwo',
            'email'=>'editorTwo@gmail.com',
            'password'=>Hash::make('editorTwo123'),
        ]);
        $editor->assignRole('Editor');
    }
}
