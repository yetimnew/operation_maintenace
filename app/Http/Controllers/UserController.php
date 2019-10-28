<?php
namespace App\Http\Controllers;
use App\User;
use App\Profile;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }


    public function index()
    {
        
        $users = User::with('profile')->get();
        $permissions = Permission::all();
 
        return view('users.index')->with('users',$users)->with('permissions',$permissions);
    }

 
    public function create()
    {
        $roles = Role::get();
        $permissions = Permission::all();
        return view('users.create')
        ->with('permissions',$permissions)
        ->with('roles',$roles);
    }


    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);
        
        // $passwprd = $request['password']; //Retrieving the roles field//Checking if a role was selected
        // $bcrypt = bcrypt( $passwprd); //Retrieving the roles field//Checking if a role was selected
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  bcrypt($request->password);
         
        $user->save();

        // $user = User::create($request->only('email', 'name', $bcrypt)); //Retrieving only the email and password data
        $roles = $request['roles']; //Retrieving the roles field//Checking if a role was selected
        $permissions = $request['permissions']; //Retrieving the roles field//Checking if a role was selected

        if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();            
            $user->assignRole($role_r); //Assigning role to user
            }
        }    
        if (isset($permissions)) {

            foreach ($permissions as $permission) {
            $role_r = Permission::where('id', '=', $permission)->firstOrFail();            
            $user->givePermissionTo($role_r); //Assigning role to user
            }
        }  
           
            //Redirect to the users.index view and display message
            return redirect()->route('user')
            ->with('flash_message','User successfully added.');
    }

       

  
    public function edit($id)
    {
        // dd("dddddddddddddddddddddd");
        $user = User::findOrFail($id);
          return view('user.edit')->with('user',$user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); //Get role specified by id

    //Validate name, email and password fields    
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:6|confirmed'
        ]);
        $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        $user->fill($input)->save();

        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully edited.');
    }


    public function destroy($id)
    {
        // dd("dddddddddddddddd");
        $user = User::findOrFail($id); 
        $user->delete();
        return redirect()->route('user')
            ->with('flash_message',
             'User successfully deleted.');
    }
}
