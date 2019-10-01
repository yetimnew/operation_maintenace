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

    // public function driverName($driver_id, $truck_id)
    // {
    //     $plate = Truck::select('plate')->where('id','=','$driver_id')->first();
    //     $driver_name = Driver::select('name')->where('id','=','$truck_id')->first();
    //  return $plate ." - ".$driver_name;
    // }
//     public function truck_driver_selected($id){
//     ->join('drivers','drivers.id','=','driver_id')
//     ->join('trucks','trucks.id','=','truck_id')
//    ->select('driver_truck.*','drivers.name as dname','trucks.plate as plate')
//    ->where('driver_truck.status','=','1','AND','driver_truck.id','=','')->get();
//     } 
    public function performances()
    {
        return $this->belongsToMany('App\Performance');
    }

}
