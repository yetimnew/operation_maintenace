<?php

namespace App;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable =['id','user_id', 'image', 'about'];
    
    public function user()
    {
            return $this->belongsTo('App\User');
        }
        
   
}
