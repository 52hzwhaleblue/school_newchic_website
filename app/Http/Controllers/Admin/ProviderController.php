<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{


    public function loadProvider()
    {
        $data = DB::table('providers')->paginate(4);
        return view('admin.provider.index', compact('data'));
    }

    public function createProvider(Request $request)
    {
        $data = DB::table('providers')->paginate(4);

        $countPrd = Provider::all()->count();
        $date= Date('Ymd');
        $randomID = 'NCC' .$date. $countPrd;

        $providers = new Provider;
        $providers->id = $randomID;

        $providers->name = $request->provider_name;
        $providers->address = $request->address;
        $providers->phone = $request->phone;
        $providers->status = $request->status;
        $providers->save();
        return redirect()->route('admin.provider.index');
    }


}