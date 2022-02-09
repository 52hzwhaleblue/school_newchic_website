<?php

namespace App\Http\Controllers\User;

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

    public function loginForm(){
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
        ]);
        if (Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->get('remember'))) {
            $user = DB::table('users')->where('email',$request->email)->get();
            foreach($user as $item){
                Session::put('customers',$item);
                Session::put('carts',[]);
            }
            return redirect()->route('user.home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        Session::flush();
        $request->session()->invalidate();
        return redirect()->route('user.home');
    }
}
