<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $now = Carbon::now();
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $adverts = Ad::orderBy('id', 'DESC')->paginate(20);
        foreach($adverts as $advert){
            if($advert->end_date > $now->today()){
                $advert->status = 4;
                $advert->save();
            }
        }
        return view('home',['categories'=>$categories, 'adverts'=>$adverts]);
    }

    public function viewAdvert($slug){
        $advert = Ad::where('slug', $slug)->where('status',1)->first();
        $categories = Category::orderBy('category_name', 'ASC')->get();
        if(!empty($advert)){
            $related = Ad::where('category_id', $advert->category_id)
                ->where('status',1)
                ->where('id', '!=', $advert->id)->get();
                return view('ads.advert-detail', ['detail'=>$advert, 'related'=>$related, 'categories'=>$categories]);

        }else{
            return back();
        }

    }

    public function contactVendor($vendor){
        $vendor = Customer::where('slug', $vendor)->first();
        if(!empty($vendor)){
            return view('vendor.contact-vendor', ['vendor'=>$vendor]);
        }else{
            return back();
        }
    }
}
