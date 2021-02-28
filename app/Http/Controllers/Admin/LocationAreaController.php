<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Area;

class LocationAreaController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function locations(){
        $locations = Location::orderBy('location_name', 'ASC')->get();
        return view('admin.ads.locations', ['locations'=>$locations]);
    }

    public function storeLocation(Request $request){
        $this->validate($request,[
            'location_name'=>'required'
        ]);
        $location = new Location;
        $location->create($request->all());
        session()->flash("success", "<strong>Success!</strong> New location registered.");
        return back();
    }

    public function areas(){
        $areas = Area::orderBy('location_id', 'ASC')->get();
        $locations = Location::orderBy('location_name', 'ASC')->get();
        return view('admin.ads.areas', ['areas'=>$areas, 'locations'=>$locations]);
    }

    public function storeArea(Request $request){
        $this->validate($request,[
            'area_name'=>'required'
        ]);
        $area = new Area;
        $area->create($request->all());
        session()->flash("success", "<strong>Success!</strong> New area registered.");
        return back();
    }
}
