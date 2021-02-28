<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Customer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /* protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    } */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
   /*  protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
 */

    public function register(Request $request){
        $this->validate($request,[
            'email_address'=>'required|unique:customers,email',
            'first_name'=>'required',
            'phone_no'=>'required',
            'password'=>'required|confirmed',
            'agreement'=>'required'
        ]);

        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->surname = $request->surname;
        $customer->email = $request->email_address;
        $customer->phone_no = $request->phone_no;
        $customer->password = bcrypt($request->password);
        $customer->slug = substr(sha1(time()),27,40);
        $customer->save();
        session()->flash("success", "<strong>Success!</strong> Registration done. Please proceed to login.");
        return back();
    }
}
