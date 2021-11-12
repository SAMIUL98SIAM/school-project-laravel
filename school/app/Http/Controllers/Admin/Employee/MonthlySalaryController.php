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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Float_;

class MonthlySalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData']= User::where('usertype','employee')->get();
        return view('admin.employee.employee_monthlysalary.index',$data);
    }

    public function getSalary(Request $request)
    {
        $date = date('Y-m',strtotime($request->date ));
        if($date != '')
        {
            $where[] = ['date','like',$date.'%'] ;
        }
        $data = EmployeeAttendence::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
        $html['thsource'] ='<th>SL</th>' ;
        $html['thsource'] .='<th>Employee Name</th>' ;
        $html['thsource'] .='<th>Basic Salary</th>' ;
        $html['thsource'] .='<th>Salary (This Month)</th>' ;
        $html['thsource'] .='<th>Action</th>' ;

        foreach($data as $key => $attend)
        {
            $totalattend = EmployeeAttendence::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status','Absent'));
            $color = 'success';
                $html[$key]['tdsource'] ='<td>'.($key+1).'</td>' ;
                $html[$key]['tdsource'] .='<td>'.$attend['user']['name'].'</td>' ;
                $html[$key]['tdsource'] .='<td>'.$attend['user']['salary'].'</td>' ;

                $salary = (float)$attend['user']['salary'];
                $salaryperday = (float)$salary/30;
                $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
                $totalsalary = (float)$salary-(float)$totalsalaryminus;
                $html[$key]['tdsource'] .='<td>'.$totalsalary.'TK'.'</td>' ;
                $html[$key]['tdsource'] .='<td>' ;
                $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.' title="PaySlip" target="_blank" href="'.route("employees.monthly.salary.payslip",$attend->employee_id).'">Payslip</a>' ;
                $html[$key]['tdsource'] .='</td>' ;
        }
        return response()->json($html);
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

    public function payslip(Request $request, $employee_id)
    {
        $id = EmployeeAttendence::where('employee_id',$employee_id)->first();
        $date = date('Y-m',strtotime($id->date));
        if($date != ''){
            $where[] = ['date','like',$date.'%'];
        }
        $data['totalattendgroupbyid'] = EmployeeAttendence::with(['user'])->where($where)->where('employee_id',$id->employee_id)->get();
        $pdf = PDF::loadView('admin.employee.employee_monthlysalary.monthlysalary_details_pdf', $data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');
    }

}
