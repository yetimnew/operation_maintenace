<?php

namespace App\hrm;
use App\Truck;
use App\DriverTuck;
use App\Performance;

use Illuminate\Database\Eloquent\Model;

class Personale extends Model
{
    protected $fillable = [
            'id',
            'driverid',
            'firstname', 
            'fathername',
            'gfathername',
            'sex',
            'birthdate', 
            'zone', 
            'woreda', 
            'kebele',
            'housenumber', 
            'mobile', 
            'hireddate',
            'driver',
            'department_id',
            'job_id', 
            'status'
            ];

    protected $dates = ['deleted_at'];
    public function getSexAttribute($attribute)
    {
        return [
            1 => "Male",
            0 => "Female"
        ][$attribute];
    }
    public function trucks()
    {
        return $this->belongsToMany('App\Operation\Truck','driver_truck','driver_id', 'truck_id');
    }
    

    public function performances()
    {
        return $this->hasMany('App\Operation\Performance');
    }
    public function department()
    {
        return $this->belongsTo('App\Hrm\Department');
    }
    public function job()
    {
        return $this->belongsTo('App\Hrm\Job');
    }
    public function scopeActive($query)
    {
      return $query->where('status',1);
    }
    public function getNameAttribute($value)
    {
        return  ucwords($value);
    }
    public function getFullNameAttribute()
    {
        return  ucfirst($this->firstname . ' '. ucfirst($this->fathername)  . ' '. ucfirst($this->gfathername) );
    }
}
