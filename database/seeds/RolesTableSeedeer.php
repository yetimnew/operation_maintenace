<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Contracts\Permission;

class RolesTableSeedeer extends Seeder
{

    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        // $role->givePermissionTo(Permission::all('admin')); 
        $role = Role::create(['name' => 'user']);
        // $role->givePermissionTo('truck_view');
    }
}
