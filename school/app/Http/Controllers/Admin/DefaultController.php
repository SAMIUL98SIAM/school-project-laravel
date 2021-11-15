<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountEmployeeSalary;
use App\Models\AccountStudentFee;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use App\Models\EmployeeAttendence;
use App\Models\StudentClass;
use App\Models\FeeCategoryAmount;
use App\Models\Group;
use App\Models\StudentShift;
use App\Models\User;
use App\Models\Year;
use App\Models\StudentMarks;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function getStudent(Request $request)
    {
        $year_id = $request->year_id ;
        $class_id = $request->class_id ;
        $allData = AssignStudent::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
        return response()->json($allData);
    }

    public function getSubject(Request $request)
    {
        $class_id = $request->class_id ;
        $allData = AssignSubject::with(['subject'])->where('class_id',$class_id)->get();
        return response()->json($allData);
    }

    public function getMark(Request $request)
    {
        $year_id = $request->year_id ;
        $class_id = $request->class_id ;
        $assign_subject_id = $request->assign_subject_id ;
        $exam_type_id = $request->exam_type_id ;
        $allData = StudentMarks::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();
        return response()->json($allData);
    }

    public function getAccountFee(Request $request)
    {
        $year_id = $request->year_id ;
        $class_id = $request->class_id ;
        $fee_category_id = $request->fee_category_id ;
        $date = date('Y-m',strtotime($request->date));
        $data = AssignStudent::with(['discount'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
        $html['thsource'] ='<th>ID NO</th>' ;
        $html['thsource'] .='<th>Student Name</th>' ;
        $html['thsource'] .='<th>Fathers name</th>' ;
        $html['thsource'] .='<th>Original Fee</th>' ;
        $html['thsource'] .='<th>Discount Amount</th>' ;
        $html['thsource'] .='<th>Fee (This Student)</th>' ;
        $html['thsource'] .='<th>Select</th>' ;

        foreach($data as $key => $std)
        {
            $studentsfee = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->where('class_id',$std->class_id)->first();
            $accountstudentfees = AccountStudentFee::where('student_id',$std->student_id)->where('year_id',$std->year_id)->where('class_id',$std->class_id)->where('fee_category_id',$fee_category_id)->where('date',$date)->first();
            if($accountstudentfees!=null)
            {
                $checked='checked';
            }else{
                $checked='';
            }
            $html[$key]['tdsource'] ='<td>'.$std['student']['id_no'].'<input type="hidden" name="fee_category_id" value="'.$fee_category_id.'">'.'</td>' ;

            $html[$key]['tdsource'] .='<td>'.$std['student']['name'].'<input type="hidden" name="year_id" value="'.$std->year_id.'">'.'</td>' ;

            $html[$key]['tdsource'] .='<td>'.$std['student']['fname'].'<input type="hidden" name="class_id" value="'.$std->class_id.'">'.'</td>' ;

            $html[$key]['tdsource'] .='<td>'.$studentsfee->amount.'TK'.'<input type="hidden" name="date" value="'.$date.'">'.'</td>' ;

            $html[$key]['tdsource'] .='<td>'.$std['discount']['discount'].'%'.'</td>' ;

            $originalfee = $studentsfee->amount;
            $discount = $std['discount']['discount'];
            $discountablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discountablefee;

            $html[$key]['tdsource'] .='<td>'.'<input type="text" name="amount[]" value="'.$finalfee.'" TK class="form-control" readonly>'.'</td>' ;

            $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="student_id[]" value="'.$std->student_id.'">'.'<input type="checkbox" name="checkmanage[]" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left:10px;">'.'</td>' ;

        }
        return response()->json(@$html);
    }

    public function getAccountSalary(Request $request)
    {
        $date = date('Y-m',strtotime($request->date ));
        if($date != '')
        {
            $where[] = ['date','like',$date.'%'] ;
        }
        $data = EmployeeAttendence::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
        $html['thsource'] ='<th>SL</th>' ;
        $html['thsource'] .='<th>ID No</th>' ;
        $html['thsource'] .='<th>Employee Name</th>' ;
        $html['thsource'] .='<th>Basic Salary</th>' ;
        $html['thsource'] .='<th>Salary (This Month)</th>' ;
        $html['thsource'] .='<th>Select</th>' ;

        foreach($data as $key => $attend)
        {
            $accountemployeesalary = AccountEmployeeSalary::where('employee_id',$attend->employee_id)->where('date',$date)->first();
            if($accountemployeesalary!=null)
            {
                $checked='checked';
            }
            else{
                $checked='';
            }
            $totalattend = EmployeeAttendence::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status','Absent'));
            $color = 'success';
                $html[$key]['tdsource'] ='<td>'.($key+1).'</td>' ;
                $html[$key]['tdsource'] .='<td>'.$attend['user']['id_no'].'<input type="hidden" name="date" value="'.$date.'"'.'</td>' ;
                $html[$key]['tdsource'] .='<td>'.$attend['user']['name'].'</td>' ;
                $html[$key]['tdsource'] .='<td>'.$attend['user']['salary'].'</td>' ;

                $salary = (float)$attend['user']['salary'];
                $salaryperday = (float)$salary/30;
                $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
                $totalsalary = (float)$salary-(float)$totalsalaryminus;

                $html[$key]['tdsource'] .='<td>'.$totalsalary.'<input type="hidden" name="amount[]" value="'.$totalsalary.'" TK">'.'</td>' ;

                $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="employee_id[]" value="'.$attend->employee_id.'">'.'<input type="checkbox" name="checkmanage[]" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left:10px;">'.'</td>' ;
        }
        return response()->json($html);
    }

}
