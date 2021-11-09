<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\Year;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class MonthlyFeeController extends Controller
{

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['years'] = Year::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        return view('admin.student.monthly_fee.index',$data);
    }

    public function getStudent(Request $request)
    {
        $year_id = $request->year_id ;
        $class_id = $request->class_id ;
        if($year_id != '')
        {
            $where[] = ['year_id','like',$year_id.'%'] ;
        }
        if($class_id != '')
        {
            $where[] = ['class_id','like',$class_id.'%'] ;
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();
        $html['thsource'] ='<th>SL</th>' ;
        $html['thsource'] .='<th>ID NO</th>' ;
        $html['thsource'] .='<th>Student Name</th>' ;
        $html['thsource'] .='<th>Roll No</th>' ;
        $html['thsource'] .='<th>Monthly Fee</th>' ;
        $html['thsource'] .='<th>Discount Amount</th>' ;
        $html['thsource'] .='<th>Fee (This Student)</th>' ;
        $html['thsource'] .='<th>Action</th>' ;

        foreach($allStudent as $key => $v)
        {
            $registrationfee = FeeCategoryAmount::where('fee_category_id','2')->where('class_id',$v->class_id)->first();
            $color = 'success';
                $html[$key]['tdsource'] ='<td>'.($key+1).'</td>' ;
                $html[$key]['tdsource'] .='<td>'.$v['student']['id_no'].'</td>' ;
                $html[$key]['tdsource'] .='<td>'.$v['student']['name'].'</td>' ;
                $html[$key]['tdsource'] .='<td>'.$v->roll.'</td>' ;
                $html[$key]['tdsource'] .='<td>'.$registrationfee->amount.'TK'.'</td>' ;
                $html[$key]['tdsource'] .='<td>'.$v['discount']['discount'].'%'.'</td>' ;

                $originalfee = $registrationfee->amount;
                $discount = $v['discount']['discount'];
                $discountablefee = $discount/100*$originalfee;
                $finalfee = (float)$originalfee-(float)$discountablefee;

                $html[$key]['tdsource'] .='<td>'.$finalfee.'TK'.'</td>' ;
                $html[$key]['tdsource'] .='<td>' ;
                $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="Payslip" target="_blank" href="'.route("students.monthly.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&month='.$request-> month.'">Fee Slip</a>' ;
                $html[$key]['tdsource'] .='</td>' ;
        }
        return response()->json(@$html);
    }



      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function playslip(Request $request)
    {
        $student_id = $request->student_id ;
        $class_id = $request->class_id ;
        $data['month'] = $request->month ;
        $data['details'] = AssignStudent::with(['discount','student'])->where('student_id',$student_id)->where('class_id',$class_id)->first();
        $pdf = PDF::loadView('admin.student.monthly_fee.monthly_fee_details_pdf', $data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');
    }
}
