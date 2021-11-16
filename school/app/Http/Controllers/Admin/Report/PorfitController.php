<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\AccountOtherCost;
use App\Models\AccountStudentFee;
use App\Models\AccountEmployeeSalary;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;

class PorfitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.report.profit.index');
    }

    public function getProfit(Request $request)
    {
        $start_date = date('Y-m',strtotime($request->start_date ));
        $end_date = date('Y-m',strtotime($request->end_date ));
        $sdate = date('Y-m-d',strtotime($request->start_date ));
        $edate = date('Y-m-d',strtotime($request->end_date ));
        $student_fee = AccountStudentFee::whereBetween('date',[$start_date, $end_date])->sum('amount');
        $other_cost = AccountOtherCost::whereBetween('date',[$sdate, $edate])->sum('amount');
        $employee_salary = AccountEmployeeSalary::whereBetween('date',[$start_date, $end_date])->sum('amount');
        $total_cost = $other_cost + $employee_salary;
        $profit = $student_fee - $total_cost;
        $html['thsource'] ='<th>Student Fee</th>' ;
        $html['thsource'] .='<th>Other Cost</th>' ;
        $html['thsource'] .='<th>Employee Salary Salary</th>' ;
        $html['thsource'] .='<th>Total Cost</th>' ;
        $html['thsource'] .='<th>Profit</th>' ;
        $html['thsource'] .='<th>Action</th>' ;
        $color = 'success';
        $html['tdsource'] ='<td>'.$student_fee.'</td>' ;
        $html['tdsource'] .='<td>'.$other_cost.'</td>' ;
        $html['tdsource'] .='<td>'.$employee_salary.'</td>' ;
        $html['tdsource'] .='<td>'.$total_cost.'</td>' ;
        $html['tdsource'] .='<td>'.$profit.'</td>' ;
        $html['tdsource'] .='<td>' ;
        $html['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PDG" target="_blank" href="'.route("students.monthly.fee.payslip").'?start_date='.$sdate.'&end_date='.$edate.'"><i class="fa fa-file"></i></a>' ;
        $html['tdsource'] .='</td>' ;
        return response()->json(@$html);
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
        // $id = EmployeeAttendence::where('employee_id',$employee_id)->first();
        // $date = date('Y-m',strtotime($id->date));
        // if($date != ''){
        //     $where[] = ['date','like',$date.'%'];
        // }
        // $data['totalattendgroupbyid'] = EmployeeAttendence::with(['user'])->where($where)->where('employee_id',$id->employee_id)->get();
        // $pdf = PDF::loadView('admin.employee.employee_monthlysalary.monthlysalary_details_pdf', $data);
        // $pdf->SetProtection(['copy','print'],'','pass');
        // return $pdf->stream('document.pdf');
    }
}
