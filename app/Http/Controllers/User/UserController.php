<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function myProfile(){
        return view('user.profile.information');
    }

    public function register(Request $request){

        $user = new User();
        $user->id = $request->id;
        $user->fullName = $request->full_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token =$request->token;
        
        
        if($user->save()){
            return response()->json([
                'success'=>true,
            ]);
        }else{
            return response()->json([
                'success'=>false,
            ]);
        }
    }

    // danh sách nguười dùng đăng ký
    public function listUser(Request $request){
        
        return DB::table('users')->get();
        
    }
}