<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.index', ['users'=>$users]);
    }


    public function addNewEmployee()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('admin.create', ['roles'=>$roles]);
    }

    public function storeNewEmployee(Request $request){
        $this->validate($request,[
            'first_name'=>'required',
            'surname'=>'required',
            'email'=>'required|email|unique:users,email',
            'mobile_no'=>'required',
            'gender'=>'required',
            'role'=>'required',
            'address'=>'required'
        ]);
        $password = substr(sha1(time()), 32,40);
        $hashed_password = bcrypt($password);
        $url = substr(md5(time()),22,32);
        $added_by = 1; //Auth::user()->id;
        $auth = ['password'=>$hashed_password, 'url'=>$url, 'added_by'=>$added_by];
        $user = new User;
        $user->create(array_merge($request->all(), $auth));

        if($user){
            #Assign role
            $role = Role::find($request->role);
            $user->assignRole($role->name);
            session()->flash("success", "<strong>Success!</strong> New employee registered.");
            return redirect()->route('all-employees');
        }else{
            session()->flash("error", "<strong>Ooops!</strong> Something went wrong.");
            return redirect()->back();
        }
    }

    public function viewEmployeeProfile($slug){
        $user = User::where('url', $slug)->first();
        if(!empty($user)){
            return view('admin.employee-profile', ['user'=>$user]);
        }else{
            return back();
        }
    }


    public function roles()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('admin.roles', ['roles'=>$roles]);
    }

    public function storeRole(Request $request){
        $this->validate($request,[
            'role_name'=>'required|unique:roles,name'
        ]);
        $role = Role::create(['name' => $request->role_name]);
        if($role){
            session()->flash("success", "<strong>Success!</strong> New role registered.");
            return redirect()->route('roles');
        }else{
            session()->flash("error", "<strong>Ooops!</strong> Something went wrong.");
            return redirect()->back();
        }
    }
    public function permissions()
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('admin.permissions', ['permissions'=>$permissions]);
    }

    public function storePermission(Request $request){
        $this->validate($request,[
            'permission_name'=>'required|unique:permissions,name'
        ]);
        $permission = Permission::create(['name' => $request->permission_name]);
        if($permission){
            session()->flash("success", "<strong>Success!</strong> New permission registered.");
            return redirect()->route('permissions');
        }else{
            session()->flash("error", "<strong>Ooops!</strong> Something went wrong.");
            return redirect()->back();
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
