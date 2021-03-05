<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\Area;
use App\Models\Ad;

use Auth;

class AdsManagementController extends Controller
{
    public $advertModel;
    public function __construct(){
        $this->middleware('auth:admin');
        $this->advertModel = new Ad;
    }

    public function categories(){
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('admin.ads.categories', ['categories'=>$categories]);
    }

    public function storeCategory(Request $request){
        $this->validate($request,[
            'category_name'=>'required|unique:categories,category_name'
        ]);
         if (!empty($request->file('featured_image'))) {
           $image = Image::make($request->file('featured_image'));
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            $dir = 'attachments/category/featured-images/';
            $featured_image = '_' . uniqid() . '_' . time() . '_' . date('Ymd') . '.' . $extension;

            $image->save(public_path($dir.$featured_image));
        } else {
            $featured_image = '';
        }
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->featured_image = $featured_image;
        $category->slug = Str::slug($request->category_name.'_'.substr(sha1(time()),32,40));
        $category->save();
        session()->flash("success", "<strong>Success!</strong> New category added.");
        return redirect()->route('donzy.categories');
    }
    public function subCategories(){
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subs = SubCategory::orderBy('category_id', 'ASC')->get();
        return view('admin.ads.sub-categories', ['categories'=>$categories, 'subs'=>$subs]);
    }

    public function storeSubCategory(Request $request){
        $this->validate($request,[
            'sub_category_name'=>'required|unique:categories,category_name'
        ]);
        $category = new SubCategory;
        $category->category_id = $request->category;
        $category->sub_category_name = $request->sub_category_name;
        $category->save();
        session()->flash("success", "<strong>Success!</strong> New sub-category added.");
        return redirect()->route('donzy.sub-categories');
    }

    public function showPackages(){
        $packages = Package::orderBy('amount', 'ASC')->get();
        return view('admin.ads.packages',['packages'=>$packages]);
    }

    public function storePackage(Request $request){
        $request->validate([
           'package_name'=>'required',
           'duration'=>'required',
           'amount'=>'required',
           'package_category'=>'required',
           'promotion_power'=>'required',
           'auto_renew'=>'required'
        ]);
        $package = new Package;
        $package->package_name = $request->package_name;
        $package->duration = $request->duration;
        $package->amount = $request->amount;
        $package->adpack_category = $request->package_category;
        $package->adpack = $request->promotion_power;
        $package->auto_renew = $request->auto_renew;
        $package->sms_notification = $request->sms_notification ?? 0;
        $package->email_notification = $request->email_notification ?? 0;
        $package->website_link = $request->website_link ?? 0;
        $package->save();
        session()->flash("success", "<strong>Success!</strong> New package registered.");
        return back();
    }
    public function showEditPackage($id){
        $packages = Package::orderBy('amount', 'ASC')->get();
        $package = Package::find($id);
        return view('admin.ads.package-edit',['packages'=>$packages,'package'=>$package]);
    }
    public function editPackage(Request $request){
        $request->validate([
           'package_name'=>'required',
           'duration'=>'required',
           'amount'=>'required',
           'package_category'=>'required',
           'promotion_power'=>'required',
           'auto_renew'=>'required'
        ]);
        $package = Package::find($request->package);
        $package->package_name = $request->package_name;
        $package->duration = $request->duration;
        $package->amount = $request->amount;
        $package->adpack_category = $request->package_category;
        $package->adpack = $request->promotion_power;
        $package->auto_renew = $request->auto_renew;
        $package->sms_notification = $request->sms_notification ?? 0;
        $package->email_notification = $request->email_notification ?? 0;
        $package->website_link = $request->website_link ?? 0;
        $package->save();
        session()->flash("success", "<strong>Success!</strong> Changes saved.");
        return redirect()->route('donzy.packages');
    }

    public function manageAdverts(){
        $adverts = $this->advertModel->orderBy('id', 'DESC')->get();
        return view('admin.ads.manage-adverts',['adverts'=>$adverts]);
    }

    public function viewAdvert($slug){
        $advert = $this->advertModel->where('slug', $slug)->first();
        if(!empty($advert)){
            return view('admin.ads.view-advert',['advert'=>$advert]);
        }else{
            session()->flash("error", "<strong>Ooops!</strong> Record does not exist.");
            return back();
        }
    }

    public function getSubcategories(Request $request){
        $subcategories = SubCategory::where('category_id', $request->category)->orderBy('sub_category_name', 'ASC')->get();
    return view('admin.employee.partials._sub-categories',['subcategories'=>$subcategories]);
   }
    public function getLocations(Request $request){
        $areas = Area::where('location_id', $request->location)->orderBy('area_name', 'ASC')->get();
    return view('admin.employee.partials._areas',['areas'=>$areas]);
   }
}
