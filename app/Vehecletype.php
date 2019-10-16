<?php

namespace App;

use App\Truck;
use Illuminate\Database\Eloquent\Model;

class Vehecletype extends Model
{
    protected $fillable = ['id', 'name', 'company', 'productiondate', 'comment', 'status',''];
   
 
    public function trucks()
    {
        return $this->hasMany('App\Truck');
    }
}
