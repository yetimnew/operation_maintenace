<?php

namespace App\Operation;

use App\Operation;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function operations()
    {
        return $this->hasMany('App\Operation\Operation');
    }
    public function places()
    {
        return $this->hasMany('App\Operation\Place');
    }
}
