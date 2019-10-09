<?php

namespace App;

use App\Truck;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name', 'email', 'password',
    ];

 protected $hidden = [
        'password', 'remember_token',
    ];
    protected function truck()
    {
     return $this->hasOne('App\Truck');
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	public function role()
    {
        return $this->hasOne('App\Role');
    }
	public function checkIfUserhasRole($need_role)
    {
        return (strtolower($need_role) == strtolower($this->role->name)) ? true : null;
    }

    public function hasRole($roles)
    {
        if(is_array($roles)){
            foreach($roles as $need_role){
                if($this->checkIfUserhasRole($need_role)){
        return true;
                }
            }
        }else{
            return $this->checkIfUserhasRole($roles);
        }
         return false;
    }
}
