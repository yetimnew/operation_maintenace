<?php

namespace App;

use App\Status;
use Illuminate\Database\Eloquent\Model;

class Statustype extends Model
{
   protected $fillable =[
    'name',
    'statusgroup',
    'comment'];
    public function statuses()
    {
        return $this->belongsToMany('App\Status');
    }

}
