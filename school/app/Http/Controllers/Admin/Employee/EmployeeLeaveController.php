<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;


class EmployeeLeaveController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData']= EmployeeLeave::orderBy('id','desc')->get();
        return view('admin.employee.employee_leave.index',$data);
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
        return view('admin..employee.employee_leave.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->leave_purpose_id == '0')
        {
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name ;
            $leavepurpose->save();
            $leave_purpose_id = $leavepurpose->id ;
        }
        else
        {
            $leave_purpose_id = $request->leave_purpose_id ;
        }
        $employee_leave = new EmployeeLeave();
        $employee_leave->employee_id = $request->employee_id ;
        $employee_leave->start_date = date('Y-m-d',strtotime($request->start_date));
        $employee_leave->end_date = date('Y-m-d',strtotime($request->end_date));
        $employee_leave->leave_purpose_id = $leave_purpose_id ;
        $employee_leave->save();
        return redirect()->route('employees.leave.view')->with('success','employee leave inserted successfully');
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
        $data['editData'] = EmployeeLeave::find($id);
        $data['employees'] = User::where('usertype','employee')->get();
        $data['leave_purposes'] = LeavePurpose::all();
        return view('admin.employee.employee_leave.edit',$data);
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
        if($request->leave_purpose_id == '0')
        {
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name ;
            $leavepurpose->save();
            $leave_purpose_id = $leavepurpose->id ;
        }
        else
        {
            $leave_purpose_id = $request->leave_purpose_id ;
        }
        $employee_leave = EmployeeLeave::find($id);
        $employee_leave->employee_id = $request->employee_id ;
        $employee_leave->start_date = date('Y-m-d',strtotime($request->start_date));
        $employee_leave->end_date = date('Y-m-d',strtotime($request->end_date));
        $employee_leave->leave_purpose_id = $leave_purpose_id ;
        $employee_leave->save();
        return redirect()->route('employees.leave.view')->with('success','employee leave updated successfully');
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
