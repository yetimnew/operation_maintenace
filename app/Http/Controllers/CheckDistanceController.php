<?php

namespace App\Http\Controllers;

use App\Distance;
use Illuminate\Http\Request;

class CheckDistanceController extends Controller
{
    public function check_distance($id)
    {
        $distance = Distance::findOrFail($id);
        return $distance;
    }
}
