<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
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
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();
        session()->flash("success", "<strong>Success!</strong> New category added.");
        return redirect()->route('categories');
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
        return redirect()->route('sub-categories');
    }

    public function showPackages(){
        $packages = Package::orderBy('amount', 'ASC')->get();
        return view('admin.ads.packages',['packages'=>$packages]);
    }

    public function storePackage(Request $request){
        $request->validate([
           'package_name'=>'required',
           'duration'=>'required',
           'amount'=>'required'
        ]);
        $package = new Package;
        $package->package_name = $request->package_name;
        $package->duration = $request->duration;
        $package->amount = $request->amount;
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
           'amount'=>'required'
        ]);
        $package = Package::find($request->package);
        $package->package_name = $request->package_name;
        $package->duration = $request->duration;
        $package->amount = $request->amount;
        $package->save();
        session()->flash("success", "<strong>Success!</strong> New package registered.");
        return redirect()->route('packages');
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
