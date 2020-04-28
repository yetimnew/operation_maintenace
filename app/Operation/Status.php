<?php

namespace App\Operation;

use App\Statustype;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $filllable =[
        'id',
        'autoid',
        'statustype_id',
        'plate',
        'registerddate',
    ];
    public function scopeLatestFirst($query)
    {
       return  $query->orderBy('created_at','desc');
    }
    public function statustype()
    {
        return $this->belongsTo('App\Operation\Statustype');
    }
    public function scopeOnGraje($query)
    {
        return $query->where("is_returned", "=",0)->where("satus", "=",1);
    }


}
