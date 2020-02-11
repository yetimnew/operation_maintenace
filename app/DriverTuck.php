<?php

namespace App;

use App\Truck;
use App\Driver;
use App\Performance;
use Illuminate\Database\Eloquent\Model;

class DriverTuck extends Model
{
    protected $table = 'driver_truck';
    protected $dates = ['deleted_at', 'date_recived','date_detach',];
    
    protected $fillable = [
        'id',
        'driverid',
        'plate',
        'date_recived',
        'date_detach',
        'reason',
        'is_attached',
        'deleted_at',
        'status' 
    ];

    public function performances()
    {
        return $this->belongsToMany('App\Performance');
    }
    public function drivers()
    {
        return $this->belongsToMany('App\Driver');
    }
    public function trucks()
    {
        return $this->belongsToMany('App\Truck');
    }

}
