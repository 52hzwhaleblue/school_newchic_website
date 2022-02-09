<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin';

    // public function __construct()
    // {
    //     $this->middleware('guest:admin')->except('logout');
    // }

    public function loginForm(){
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->get('remember'))) {

            $emp = DB::table('employees')->where('email',$request->email)->get();
             foreach($emp as $item){
                    Session::put('emp',$item);
             }

            return redirect()->route('admin.dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }



    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login.get');
    }
}
