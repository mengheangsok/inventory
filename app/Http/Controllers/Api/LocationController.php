<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;
use App\Http\Resources\LocationResourece;
use App\Http\Resources\LocationCollection;

class LocationController extends Controller
{
    public function index(){
        $locations = Location::select('name','created_at')->get();

        return new LocationCollection($locations);
    }

    public function paginate(){
        $locations = Location::select('name','created_at')->paginate(1);

        return new LocationCollection($locations);
    }

    public function show(){
        $location = Location::find(1);

        return new LocationResourece($location);
    }
}
