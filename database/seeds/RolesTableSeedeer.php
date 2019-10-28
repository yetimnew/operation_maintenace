<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeedeer extends Seeder
{

    public function run()
    {
        $role = Role::create(['name' => 'admin']);

        $role->givePermissionTo( 'truck create',
        'truck edit',
        'truck delete',
        'truck view',
             //Truck
        'truck_model create',
        'truck_model edit',
        'truck_model delete',
        'truck_model view',
        //Truck
        'driver create',
        'driver edit',
        'driver delete',
        'driver view',
        //OPERATION
        'operation create',
        'operation edit',
        'operation delete',
        'operation view',
      
        //OPERATION place
        'operation_place create',
        'operation_place edit',
        'operation_place delete',
        'operation_place view',
        //OPERATION region
        'operation_region create',
        'operation_region edit',
        'operation_region delete',
        'operation_region view',
        //OPERATION region
        'customer create',
        'customer edit',
        'customer delete',
        'customer view',
        //performance
        'performance create',
        'performance edit',
        'performance delete',
        'performance view',
        //status
        'status create',
        'status edit',
        'status delete',
        'status view',
        //status type
        'status_type create',
        'status_type edit',
        'status_type delete',
        'status_type view',
        //Truck Driver
        'truck_driver create',
        'truck_driver edit',
        'truck_driver delete',
        'truck_driver view'
    );
 
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('truck_view');
    }
}
