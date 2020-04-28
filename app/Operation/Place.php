<?php

namespace App\Operation;

use App\Region;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'id', 
        'name',
        'region_id',
        'comment',
        'status'
    ];
    public function region()
    {
        return $this->belongsTo('App\Operation\Region');
    }
    public function scopeActive($query)
    {
      return $query->where('status',1);
    }
}
