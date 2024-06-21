<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_data=[
            'Admin',
            'Editor',
        ];
      foreach ($role_data as $data) {
          Role::create(['name'=>$data]);
      };

    }
}
