<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Location;
use App\Models\Area;
use App\Models\Ad;
use App\Models\AdsGallery;
use App\Models\Wishlist;
use App\Models\AdsReview;
use App\Models\Customer;
use Carbon\Carbon;
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
        //$this->middleware('auth');
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
         $advert = Ad::where('slug', $slug)/* ->where('status',1)->orWhere('status',0) */->first();
       $categories = Category::orderBy('category_name', 'ASC')->get();
        if(!empty($advert)){
            $related = Ad::where('category_id', $advert->category_id)
                /* ->where('status',1) */
                ->where('id', '!=', $advert->id)->get();
            $total_reviews = AdsReview::where('advertised_by', $advert->customer_id)->get();
                return view('ads.advert-detail', ['my_ad'=>$advert,
                'total_reviews'=>$total_reviews,
                'related'=>$related,
                'categories'=>$categories
                ]);
        }else{
            session()->flash("error", "<strong>Ooops!</strong> This advert must have expired or does not exist.");
            return back();
        }

    }

   /*  public function advertDetail($slug){
       $advert = Ad::where('slug', $slug)->first();
       $categories = Category::orderBy('category_name', 'ASC')->get();
        if(!empty($advert)){
            $related = Ad::where('category_id', $advert->category_id)
                ->where('status',1)
                ->where('id', '!=', $advert->id)->get();
            $total_reviews = AdsReview::where('advertised_by', $advert->customer_id)->count();
            if($advert->customer_id == Auth::user()->id){
                return view('ads.my-advert-detail', ['detail'=>$advert,
                'related'=>$related,
                'categories'=>$categories,
                'total_reviews'=>$total_reviews
                ]);
            }else{
                return view('ads.advert-detail', ['detail'=>$advert, 'total_reviews'=>$total_reviews, 'related'=>$related, 'categories'=>$categories]);
            }
        }else{
            session()->flash("error", "<strong>Ooops!</strong> This advert must have expired or does not exist.");
            return back();
        }

   } */

    public function contactVendor($vendor){
        $vendor = Customer::where('slug', $vendor)->first();
        if(!empty($vendor)){
            return view('vendor.contact-vendor', ['vendor'=>$vendor]);
        }else{
            return back();
        }
    }

    public function getAdvertByCategory($slug){
        $cat = Category::where('slug', $slug)->first();
        if(!empty($cat)){
            $adverts = Ad::where('category_id', $cat->id)->paginate(10);
            return view('related-ads',['adverts'=>$adverts, 'cat'=>$cat]);
        }else{
            return back();
        }
    }
}
