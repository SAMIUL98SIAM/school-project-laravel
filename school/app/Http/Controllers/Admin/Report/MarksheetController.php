<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\AccountOtherCost;
use App\Models\AccountStudentFee;
use App\Models\User;
use App\Models\StudentMarks;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\Year;
use App\Models\MarksGrade;
use App\Models\AccountEmployeeSalary;
use App\Models\EmployeeAttendence;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;

class MarksheetController extends Controller
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
        $data['exam_types'] = ExamType::all();
        return view('admin.report.marksheet.index',$data);
    }

    public function getMarksheet(Request $request)
    {
        $year_id = $request->year_id ;
        $class_id = $request->class_id ;
        $exam_type_id = $request->exam_type_id ;
        $id_no = $request->id_no ;
        $count_fail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();
        $singleStudent = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();
        if($singleStudent)
        {
            $allMarks = StudentMarks::with(['assign_subject','year'])->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();
            $allGrades = MarksGrade::all();
            return view('admin.report.marksheet.print_marksheet',compact('allMarks','allGrades','count_fail'));
        }
        else{
            return redirect()->back()->with('error','Sorry!! This criteria does not match');
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
        $year_id = $request->year_id ;
        $class_id = $request->class_id ;
        $exam_type_id = $request->exam_type_id ;
        $id_no = $request->id_no ;
        $data['count_fail'] = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();
        $singleStudent = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();
        if($singleStudent == true)
        {
            $data['allMarks'] = StudentMarks::with(['assign_subject','year'])->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();
            $data['allGrades']= MarksGrade::all();
            //return view('admin.report.marksheet.print_marksheet',compact('count_fail'),$data);
            $pdf = PDF::loadView('admin.report.marksheet.pdf',$data);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('document.pdf');
        }
        else
        {
            return redirect()->back()->with('error','Sorry!! This criteria does not match');
        }
    }
}
