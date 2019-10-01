<?php

namespace App;

use App\Performance;
use App\Vehecletype;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
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

    public function performances()
    {
        return $this->hasMany('App\Performance');
    }
   
    public function vehecletype()
    {
        return $this->belongsTo('App\Vehecletype');
    }



}
