<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        $user->save();
        
        if($user != null){
            return response()->json([
                'success'=>true,
            ],200);
        }else{
            return response()->json(["success"=>false],201);
        }
    }

    public function listCart($productSKU){
        return DB::table('carts')
        ->join('product_details', 'carts.productSKU', '=', 'product_details.SKU')
        ->where('product_details.SKU', $productSKU)
        ->select('product_details.*')
        ->get();
    }

    public function listAddress($userID){
        return DB::table('addresses')
        ->join('users', 'addresses.userID', '=', 'users.id')
        ->where('users.id', $userID)
        ->select('addresses.*')
        ->get();
    }

    
    public function getUserID($userEmail){
        return DB::table('users')
        ->where('users.email', $userEmail)
        ->select('users.id')
        ->get();
    }
    public function createCart(Request $request){
        $countCart = Cart::all()->count();
        $date= Date('Ymd');
        $randomID = 'EMP' .$date. $countCart;

        $cart = new Cart();
        
        $cart->id = $randomID;
        $cart->userEmail = $request->userEmail;
        $cart->productSKU = $request->productSKU;
        $cart->quantity = $request->quantity;
        $cart->status = $request->status;
        $cart->save();
        
        if($cart != null){
            return response()->json([
                'success'=>true,
            ],200);
        }else{
            return response()->json(["success"=>false],201);
        }
    }

    public function login(Request $request)
    {
        // $this->validate($request, [
        // 'email' => 'required|email',
        // 'password' => 'required|min:6'
        // ]);
       
        if (Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->get('remember'))) {
          
            $token = Str::random(length:40);
            DB ::table('users')
            ->where ('email',$request->email)
            ->update([
                'remember_token' => $token,
                'status' => 1
            ]);
           
            $users= DB::table('users') 
            ->where('remember_token',$token)
            ->select('users.*')
            ->addSelect (DB ::raw('null as address'))
            ->get();
            foreach ($users as $user){
                $addresses= DB::table('addresses')
               ->where ('userID',$user->id)
                ->select('reciver')
                ->get();
                $user->address= $addresses;
            }
            return json_encode (
               $users[0],
            );
        }else{
            return response()->json(["message"=>false],201);
        }
      
    }

    // danh sách nguười dùng đăng ký
    public function listUser(Request $request){
        
        return DB::table('users')->get();
        
    }
}