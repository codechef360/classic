<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\ApplicationLog;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm(){
        return view('admin.auth.login');
    }

    public function login(Request $request){
       $this->validate($request, [
			'email'=>'required|email',
			'password'=>'required'
		]);
        $user = User::where('email', $request->email)->first();
			if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){
				/* $message = Auth::user()->first_name." ".Auth::user()->surname." logged in.";
				$log = new ApplicationLog;
				$log->activity = $message;
				$log->user_id = Auth::user()->id;
				$log->save(); */
				session()->flash("update_profile", "<strong>Notice: </strong> You're adviced to complete your profile");
				return redirect()->route('donzy.manage-adverts');
			}else{
				 session()->flash("error", "<strong>Error! </strong> Wrong or invalid login credentials. Try again.");
				 return back();
			}
    }
}
