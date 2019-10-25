<?php

namespace App;

use App\Region;
use App\Customer;
use App\Performance;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    
    protected $gurded=[];
    protected $dates = ['startdate','edndate','deleted_at'];
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function region()
    {
        return $this->belongsTo('App\Region');
    }
    public function performances()
    {
        return $this->belongsToMany('App\Performance');
    }
}
