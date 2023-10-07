<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'gallery-list',
            'gallery-create',
            'gallery-update',
            'gallery-destroy',
            'foods-list',
            'foods-create',
            'foods-update',
            'foods-destroy',
            'permission-list',
            'permission-destroy',
            'permission-create',
            'permission-update',
            'admin-panel',
        ];

        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }
}
