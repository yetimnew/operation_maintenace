<?php

namespace App;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    // protected $fillable = ['id','name','guard_name'];
   
    $role = Role::create(['name' => 'administrator']);
    $permission = Permission::create(['name' => 'edit articles']);
}
