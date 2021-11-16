<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\AccountOtherCost;
use App\Models\AccountStudentFee;
use App\Models\User;
use App\Models\AccountEmployeeSalary;
use App\Models\EmployeeAttendence;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;
class AttendenceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees'] = User::where('usertype','employee')->get();
        return view('admin.report.attendence.index',$data);
    }

    public function getAttendence(Request $request)
    {
       $employee_id = $request->employee_id ;
       if($employee_id != '')
       {
           $where[] = ['employee_id',$employee_id];
       }
       $date = date('Y-m',strtotime($request->date));
       if($date != '')
       {
            $where[] = ['date','like',$date.'%'];
       }
       $singleAttendence = EmployeeAttendence::with(['user'])->where($where)->first();
       if ($singleAttendence)
       {
           $data['allData'] = EmployeeAttendence::with(['user'])->where($where)->get();
           $data['absents'] = EmployeeAttendence::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();
           $data['leaves'] = EmployeeAttendence::with(['user'])->where($where)->where('attend_status','Leave')->get()->count();
           $data['month'] = date('M Y',strtotime($request->date));
           $pdf = PDF::loadView('admin.report.attendence.pdf', $data);
           $pdf->SetProtection(['copy','print'],'','pass');
           return $pdf->stream('document.pdf');
       }
       else{
           return redirect()->back()->with('error','Sorry! Criteria does not match');
       }
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
    public function increment($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function increment_store(Request $request, $id)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     //
    }

    public function pdf(Request $request)
    {

    }
}
