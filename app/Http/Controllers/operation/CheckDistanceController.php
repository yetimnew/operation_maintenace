<?php

namespace App\Http\Controllers\operation;

use App\Operation\Distance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckDistanceController extends Controller
{
    public function check_distance($id)
    {
        $distance = Distance::findOrFail($id);
        return $distance;
    }
}
