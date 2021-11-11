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
use App\Models\EmployeeAttendence;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;


class EmployeeAttendenceController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData']= EmployeeAttendence::select('date')->groupBy('date')->orderBy('id','desc')->get();
        return view('admin.employee.employee_attendence.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['employees'] = User::where('usertype','employee')->get();
        $data['leave_purposes'] = LeavePurpose::all();
        return view('admin..employee.employee_attendence.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EmployeeAttendence::where('date',date('Y-m-d',strtotime($request->date)))->delete();
        $countEmployee = count($request->employee_id);
        for ($i=0; $i <$countEmployee ; $i++) {
            $attend_status = 'attend_status'.$i ;
            $attend = new EmployeeAttendence();
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status ;
            $attend->save();
        }
        return redirect()->route('employees.attendence.view')->with('success','employee attendence saved successfully');
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
    public function edit($date)
    {
        $data['editData'] = EmployeeAttendence::where('date',$date)->get();
        $data['employees'] = User::where('usertype','employee')->get();
        return view('admin.employee.employee_attendence.edit',$data);
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
      //
    }

    public function details($date)
    {
       $data['details'] = EmployeeAttendence::where('date',$date)->get();
       return view('admin.employee.employee_attendence.details',$data);
    }

}
