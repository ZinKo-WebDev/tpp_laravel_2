<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        # Category::factory(20)->create();

        $this->call([
//            AdminUserSeeder::class,
//            PermissionTableSeeder::class,
//            RoleTableSeeder::class,
//            RolePermissionTableSeeder::class,
            // StudentTableSeeder::class,
            // CourseTableSeeder::class,
        ]);
    }
}
