<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function loadEmployee(){
        $data =DB::table('employees')->paginate(4);
        return view('admin.employee.index',compact('data'));
    }

    public function createEmployee(Request $request){
        $data = DB::table('employees')->paginate(4);
        $countPrd = Employee::all()->count();
        if($request->has('avatar')){
            $file= $request->avatar;
            $ext = $request->avatar->extension();//lấy đuôi file png||jpg
            $file_name ='avatar'.$countPrd.'.'.$ext;
            $file->move(public_path('backend/assets/img/avatar'),$file_name);
        }
        $countEMP = Employee::all()->count();
        $date= Date('Ymd');
        $randomID = 'EMP' .$date. $countEMP;

        $employees = new Employee;
        $employees->id = $randomID;
        $employees->username = $request->username;
        $employees->fullName = $request->fullname;
        $employees->email = $request->email;
        $employees->password = 123456789;
        $employees->phone = $request->phone;
        $employees->address = $request->address;
        $employees->salary = $request->salary;
        $employees->type = $request->type;
        $employees->avatar = $file_name;
        $employees->status = $request->status;
        $employees->save();
        return redirect()->route('admin.employee.index');
    }

    public function deleteEmployee($id){
        $emp = Employee::find($id);
        if($emp !=null){
            $emp->delete();
            return redirect()->route('admin.imported_invoice.create_detail_view');
        }
    }
}
