<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole=Role::where('name','admin')->first();
        $adminRole->syncPermissions([
            'dashboard',
            'product_listing',
            'product_create',
            'product_edit',
            'product_delete',
            'article_index',
        ]);


        $editorRole=Role::where('name','editor')->first();
        $editorRole->syncPermissions([
            'product_listing',
            'product_create',
            'product_edit',
            'product_delete',
        ]);
    }
}
