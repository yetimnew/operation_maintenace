<?php

namespace App;

use App\Operation;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
 
    protected $guarded =[];
    public function operations()
    {
        return $this->hasMany('App\Operation');
    }
    public function scopeActive($query)
    {
      return $query->where('status',1);
    }
    public function scopeInActive($query)
    {
      return $query->where('status',0);
    }
}
