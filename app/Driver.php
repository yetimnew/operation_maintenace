<?php

namespace App;

use App\Truck;
use App\Performance;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'id',
        'driverid',
        'name',
        'sex',
        'birthdate',
        'zone',
        'woreda',
        'kebele',
        'housenumber',
        'mobile',
        'hireddate',
        'status'
    ];
    public function getSexAttribute($attribute)
    {
        return [
            1 => "Male",
            0 => "Fmale"
        ][$attribute];
    }
    public function trucks()
    {
        return $this->belongsToMany('App\Truck');
    }
    public function performances()
    {
        return $this->hasMany('App\Performance');
    }
    
}
