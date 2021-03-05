<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Ad;
use App\Models\Customer;
use App\Models\Category;
use App\Models\AdsGallery;
use App\Models\SubCategory;
use App\Models\Location;
use App\Models\Package;
use Carbon\Carbon;
use Paystack;
use Image;

use Auth;
class EmployeeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function myAdverts(){
        $adverts = Ad::where('registered_by', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('admin.employee.manage-adverts',['adverts'=>$adverts]);
    }

    public function postAdvert(){
        $customers = Customer::orderBy('company_name', 'ASC')->get();
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $locations = Location::orderBy('location_name', 'ASC')->get();
        $packages = Package::orderBy('amount', 'ASC')->get();
        return view('admin.employee.post-advert',[
            'customers'=>$customers,
            'categories'=>$categories,
            'locations'=>$locations,
            'packages'=>$packages
            ]);
    }

     public function storeAdvert(Request $request){

       $this->validate($request,[
           'title'=>'required',
           'description'=>'required',
           'category'=>'required',
           'subcategory'=>'required',
           'location'=>'required',
           'area'=>'required',
           'price'=>'required',
           'featured_image'=>'required',
           'customer'=>'required',
           'product_condition'=>'required',
           'package'=>'required',
       ]);
        $featured_image = null;
        $watermark = public_path('/images/watermark.png');

        if (!empty($request->file('featured_image'))) {
           $image = Image::make($request->file('featured_image'));
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            $dir = 'attachments/featured-images/';
            $featured_image = '_' . uniqid() . '_' . time() . '_' . date('Ymd') . '.' . $extension;
            $image->insert($watermark, 'bottom-right', 5, 5);
            $image->save(public_path($dir.$featured_image));
        } else {
            $featured_image = '';
        }
       $package = Package::find($request->package);
       //$package = Package::find($request->package);
       $current = Carbon::now();
       $ad = new Ad;
       $ad->title = $request->title;
       $ad->description = $request->description;
       $ad->price = $request->price;
       $ad->category_id = $request->category;
       $ad->sub_category_id = $request->subcategory;
       $ad->location_id = $request->location;
       $ad->area_id = $request->area;
       $ad->start_date = now();
       $ad->end_date = $current->addDays($package->duration);
       $ad->package_id = $request->package;
       $ad->customer_id = $request->customer;
       $ad->registered_by = Auth::user()->id;
       $ad->negotiable = 1;
       $ad->featured_image = $featured_image;//'not-in-use';
       $ad->slug = Str::slug($request->title.'_'.substr(sha1(time()),32,40));
       $ad->save();
       $adId = $ad->id;
        if($request->hasfile('product_images'))
         {
            foreach($request->file('product_images') as $file)
            {
                $image = Image::make($file);
                 $extension = $file->getClientOriginalExtension();
                $dir = 'attachments/product-gallery/';
                $gallery_name = '_' . uniqid() . '_' . time() . '_' . date('Ymd') . '.' . $extension;
                $image->insert($watermark, 'bottom-right', 5, 5);
                $image->save(public_path($dir.$gallery_name));
                $gallery = new AdsGallery;
                $gallery->directory = $gallery_name;
                $gallery->ads_id = $adId;
                $gallery->save();
            }
         }
       session()->flash("success", "<strong>Success!</strong> Your ads have been placed.");
      // return redirect()->route('donzy.manage-my-adverts');
      return ['redirect' => route('donzy.manage-my-adverts')];


   }


   public function updateAdvertStatus(Request $request){
       $this->validate($request,[
           'advert'=>'required',
           'status'=>'required'
       ]);
       $advert = Ad::find($request->advert);
       $advert->status = $request->status;
       $advert->save();
       session()->flash("success", "<strong>Success! </strong> Advert status updated.");
       return back();
   }

   public function manageMyCustomers(){
        $customers = Customer::where('registered_by', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('admin.employee.manage-customers', ['customers'=>$customers]);
    }


    public function showAddNewCustomerForm(){
        $locations = Location::orderBy('location_name', 'ASC')->get();
        return view('admin.employee.add-new-customer',['locations'=>$locations]);
    }

    /*
    *Proceed to make payment
    */
    public function proceedToPay(Request $request){

        $this->validate($request,[
            'email'=>'required|unique:customers,email',
            'first_name'=>'required',
            'phone_no'=>'required',
            'company_name'=>'required',
            'office_phone_no'=>'required',
            'office_address'=>'required',
            'location'=>'required',
            'area'=>'required'
        ]);
            return Paystack::getAuthorizationUrl()->redirectNow();
    }


    public function addNewCustomer(Request $request){

        $password = substr(sha1(time()),32,40);
        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->surname = $request->surname;
        $customer->email = $request->email;
        $customer->phone_no = $request->phone_no;
        $customer->company_name = $request->company_name;
        $customer->company_phone = $request->office_phone_no;
        $customer->company_address = $request->office_address;
        $customer->location_id = $request->location;
        $customer->area_id = $request->area;
        $customer->registered_by = Auth::user()->id;
        $customer->password = bcrypt($password);
        $customer->slug = substr(sha1(time()),27,40);
        $customer->save();
        session()->flash("success", "<strong>Success!</strong> Customer registered. Ask <strong><i>".$request->first_name."</i></strong> to check his/her mailbox.");
        return redirect()->route('manage-my-customers');
    }

}
