<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            RolePermissionTableSeeder::class,
            UserTableSeeder::class,
        ]);
    }
}
