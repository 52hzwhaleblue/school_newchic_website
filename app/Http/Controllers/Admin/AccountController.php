<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class AccountController extends Controller
{
    public function loadAccount(){
        $data =DB::table('users')->paginate(3);
        return view('admin.accounts.index',compact('data'));
    }
    public function loadAddress(){
        $data =DB::table('addresses')->paginate(3);
        return view('admin.address.index',compact('data'));
    }
    public function loadAccountAdmin(){
        $data =DB::table('users')->where('isAdmin',1)->paginate(3);
        return view('admin.accounts.index',compact('data'));
    }

    public function deleteAccount($id){
        $users = User::find($id);
        if($users !=null){
            $users->delete();
            return redirect()->route('admin.account');
        }
    }

    public function searchAccount(Request $request){
        if(isset($_GET['keyWord'])){
            $searchText = $_GET['keyWord'];
            $data = DB::table('users')->where('fullName','LIKE','%'.$searchText.'%')
            // ->where('type','LIKE','%NV%')
            ->paginate(4);
            $data ->appends($request->all());
            return view('admin.accounts.index',compact('data'));
        }else{
            return view('admin.dashboard');
        }
    }

    public function viewProfile(){
       return view('admin.accounts.profile');
    }
}