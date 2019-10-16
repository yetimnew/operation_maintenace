<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeedeer extends Seeder
{

    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo('truck_create','truck_edit', 'truck_delete');
 
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('truck_view');
    }
}
