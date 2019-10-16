<?php

namespace App;

use App\Performance;
use Illuminate\Database\Eloquent\Model;

class DriverTuck extends Model
{
    protected $table = 'driver_truck';
    
    protected $fillable = [
        'id',
        'driver_id',
        'truck_id',
        'date_recived',
        'date_detach',
        'reson',
        'status'
    ];

    public function performances()
    {
        return $this->belongsToMany('App\Performance');
    }

}
