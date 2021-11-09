<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\Group;
use App\Models\StudentShift;
use App\Models\User;
use App\Models\Year;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;


class EmployeeRegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData']= User::where('usertype','employee')->get();
        return view('admin.employee.employee_reg.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['designations'] = Designation::all();
        return view('admin..employee.employee_reg.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function() use($request){
            $checkYear = date('Ym',strtotime($request->join_date));
            $employee = User::where('usertype','employee')->orderBy('id','DESC')->first();
            if($employee == NULL)
            {
                $firstReg = 0;
                $employeeId = $firstReg+1;
                if($employeeId < 10)
                {
                    $id_no= '000'.$employeeId;
                }
                elseif($employeeId < 100)
                {
                    $id_no= '00'.$employeeId;
                }
                elseif($employeeId < 1000)
                {
                    $id_no= '0'.$employeeId;
                }
            }
            else
            {
                $employee = User::where('usertype','employee')->orderBy('id','DESC')->first()->id;
                $employeeId = $employee+1;
                if($employeeId < 10)
                {
                    $id_no= '000'.$employeeId;
                }
                elseif($employeeId < 100)
                {
                    $id_no= '00'.$employeeId;
                }
                elseif($employeeId < 1000)
                {
                    $id_no= '0'.$employeeId;
                }
            }
            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->usertype = 'employee';
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->gender = $request->gender;
            $user->designation_id = $request->designation_id;
            $user->password = Hash::make($code);
            $user->code = $code;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));
            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_image'),$filename);
                $user['image'] = $filename;
            }
            $user->save();

            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id ;
            $employee_salary->effected_date = date('Y-m-d',strtotime($request->join_date));
            $employee_salary->previous_salary = $request->previous_salary;
            $employee_salary->present_salary = $request->present_salary;
            $employee_salary->increment_salary = '0';
            $employee_salary->save();

        });
        return redirect()->route('employees.registration.view')->with('success','employee inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = User::find($id);
        $data['designations'] = Designation::all();
        return view('admin.employee.employee_reg.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $user = User::find($id);
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->religion = $request->religion;
            $user->gender = $request->gender;
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/employee_image/'.$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_image'),$filename);
                $user['image'] = $filename;
            }
            $user->save();
            return redirect()->route('employees.registration.view')->with('success','employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =  User::destroy($id);
        //$notifications = array('message'=>'You Deleted these package','alert-type'=>'error');
        if($user)
        {
            return redirect()->route('users.view')->with('error','Delete these guy');
            //return redirect()->back()->with($notifications);
        }
    }

    public function details($id)
    {
        $data['details'] = User::find($id);
        $pdf = PDF::loadView('admin.employee.employee_reg.employee_details_pdf', $data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');
    }



}
