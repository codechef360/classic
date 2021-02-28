<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function manageCustomers(){
        $customers = Customer::orderBy('id', 'DESC')->get();
        return view('admin.manage-customers',['customers'=>$customers]);
    }

    public function getCustomerProfile($slug){
        $customer = Customer::where('slug', $slug)->first();
        if(!empty($customer)){
            return view('admin.customer-profile',['customer'=>$customer]);
        }else{
            session()->flash("error", "<strong>Ooops!</strong> No record found.");
            return back();
        }
    }


}
