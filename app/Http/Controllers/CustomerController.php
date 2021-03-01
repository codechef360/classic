<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Ad;
use App\Models\AdsReview;
use App\Models\Message;
use App\Models\ReplyMessage;
use Auth;


class CustomerController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function profile(){
        return view('customer.profile');
    }

    public function settings(){
        return view('customer.settings');
    }
    public function myAdverts(){
        $myAds = Ad::where('customer_id', Auth::user()->id)->orderBy('id','DESC')->paginate(2);
        return view('customer.my-adverts',['my_ads'=>$myAds]);
    }
    public function myAdvertDetail($slug){
        $myAd = Ad::where('customer_id', Auth::user()->id)->where('slug',$slug)->first();
        if(!empty($myAd)){
             $total_reviews = AdsReview::where('advertised_by', $myAd->customer_id)->get();
            return view('customer.my-advert-detail',['my_ad'=>$myAd, 'total_reviews'=>$total_reviews]);
        }else{
            return bakc();
        }
    }
    public function wishlist(){
        return view('customer.wishlist');
    }

    public function saveChanges(Request $request){
        $request->validate([
            'first_name'=>'required',
            'surname'=>'required',
            'office_phone'=>'required',
            'phone_no'=>'required',
            'address'=>'required',
            'about_us'=>'required',
            'company_name'=>'required',
            'office_address'=>'required',
            //'location'=>'required',
            //'area'=>'required',
        ]);

        $changes = Customer::find(Auth::user()->id);
        $changes->first_name = $request->first_name;
        $changes->surname = $request->surname;
        $changes->company_phone = $request->office_phone;
        $changes->phone_no = $request->phone_no;
        $changes->address = $request->address;
        $changes->about = $request->about_us ?? '';
        $changes->company_name = $request->company_name ?? '';
        $changes->company_address = $request->office_address ?? '';
        $changes->website = $request->website ?? '';
        $changes->location_id = 1;//$request->location ?? '';
        //$changes->website = $request->website ?? '';
        $changes->area_id = 1;// $request->area ?? '';
        $changes->save();
        session()->flash("success", "<strong>Success!</strong> Changes saved.");
        return redirect()->route('profile');
    }

    public function messageSeller(Request $request){
        $this->validate($request,[
            'to'=>'required',
            'message'=>'required'
        ]);

        $message = new Message;
        $message->from_id = Auth::user()->id;
        $message->to_id = $request->to;
        $message->message = $request->message;
        $message->slug = sha1(time());
        $message->save();
        session()->flash("message-success", "<strong>Success!</strong> Message delivered.");
        return back();
    }

    public function myMessages(){
        return view('customer.messages');
    }

    public function readMessage($slug){
        $message = Message::where('slug',$slug)->first();
        if(!empty($message)){
            return view('customer.read-message',['message'=>$message]);
        }
    }

    public function replyMessage(Request $request){
        $this->validate($request,[
            'reply'=>'required',
            'message'=>'required'
        ]);

        $reply = new ReplyMessage;
        $reply->message_id = $request->message;
        $reply->from_id = Auth::user()->id;
        $reply->reply = $request->reply;
        $reply->save();
       session()->flash("message-success", "<strong>Success!</strong> Reply delivered.");
        return back();
    }

    public function notifications(){
        return view('customer.notifications');
    }



}