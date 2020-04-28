<?php

namespace App\Operation;

use App\Operation\Performance;
use App\Operation\Vehecletype;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasRoles; 
    protected $guard_name = 'web';
    protected $fillable = [
        'id',
        'plate',
        'vehecletype_id',
        'chasisNumber',
        'engineNumber',
        'tyreSyze', 
        'serviceIntervalKM',
        'purchasePrice', 
        'productionDate',
        'serviceStartDate',
        'status',
        'created_at',
        'updated_at',
    ];
    protected $dates =['productionDate','serviceStartDate','deleted_at'];
   
    public function drivers()
    
    {
        return $this->belongsToMany('App\Operation\Driver', 'driver_truck','driver_id','truck_id');
    }

    public function performances()
    {
        return $this->hasMany('App\Operation\Performance');
    }
   
    public function vehecletype()
    {
        return $this->belongsTo('App\Operation\Vehecletype');
    }

    public function scopeActive($query)
    {
      return $query->where('status',1);
    }



    

}
