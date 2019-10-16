<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;

class PermissionsTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run()
        {
          Permission::create(['name' => 'truck_view']);
          Permission::create(['name' => 'truck_create']);
          Permission::create(['name' => 'truck_edit']);
        //   Permission::create(['name' => 'truck_delete']);
        }
    
}