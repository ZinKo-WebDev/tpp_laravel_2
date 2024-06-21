<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionData=[
            'dashboard',
            'product_listing',
            'product_create',
            'product_edit',
            'product_delete',
            'article_index',
        ];
        foreach ($permissionData as $data) {
            Permission::create(['name'=>$data]);
        }
    }
}
