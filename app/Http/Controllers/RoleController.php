<?php

namespace App\Http\Controllers;

// use App\Role;
use Illuminate\Http\Request;
//Importing laravel-permission models
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);//isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    

    public function index()
    {

        $roles = Role::all();//Get all roles
        return view('roles.roles.index')
        ->with('roles', $roles);
        // ->with('permissisons', $permissisons);
        // ->with('role_has_permission', $role_has_permission);
    }


    public function create()
    {
        $permissions = Permission::all();//Get all permissions
        return view('roles.roles.create')->with('permissions', $permissions);
        // return view('roles.permission.create')->with('roles', $roles);

        // return view('roles.create', ['permissions'=>$permissions]);
    }

    public function store(Request $request) {
        //Validate name and permissions field
            $this->validate($request, [
                'name'=>'required|unique:roles|max:10',
                'permissions' =>'required',
                ]
            );
    
            $name = $request['name'];
            $role = new Role();
            $role->name = $name;
    
            $permissions = $request['permissions'];
    
            $role->save();
        //Looping thru selected permissions
            foreach ($permissions as $permission) {
                $p = Permission::where('id', '=', $permission)->firstOrFail(); 
             //Fetch the newly created role and assign permission
                $role = Role::where('name', '=', $name)->first(); 
                $role->givePermissionTo($p);
            }
    
            return redirect()->route('role')->with('flash_message','Role'. $role->name.' added!'); 
        }

        public function show($id) {
            return redirect('role');
        }

        public function edit($id) {
            // dd($id);
            $role = Role::findOrFail($id);
            $permissions = Permission::all();
    
            return view('roles.roles.edit', compact('role', 'permissions'));
        }


        public function update(Request $request, $id) {

            $role = Role::findOrFail($id);//Get role with the given id
        //Validate name and permission fields
            $this->validate($request, [
                'name'=>'required|max:10|unique:roles,name,'.$id,
                'permissions' =>'required',
            ]);
    
            $input = $request->except(['permissions']);
            $permissions = $request['permissions'];
            $role->fill($input)->save();
    
            $p_all = Permission::all();//Get all permissions
    
            foreach ($p_all as $p) {
                $role->revokePermissionTo($p); //Remove all permissions associated with role
            }
    
            foreach ($permissions as $permission) {
                $p = Permission::where('id', '=', $permission)->firstOrFail(); //Get corresponding form //permission in db
                $role->givePermissionTo($p);  //Assign permission to role
            }
    
            return redirect()->route('role')
                ->with('flash_message','Role'. $role->name.' updated!');
        }


        public function destroy($id)
        {
            $role = Role::findOrFail($id);
            $role->delete();
    
            return redirect()->route('role')
                ->with('flash_message','Role deleted!');
    
        }
}
