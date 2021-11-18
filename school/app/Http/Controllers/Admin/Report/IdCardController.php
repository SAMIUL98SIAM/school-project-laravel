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
use App\Models\AssignStudent;
use App\Models\EmployeeAttendence;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;

class IdCardController extends Controller
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
        return view('admin.report.id_card.index',$data);
    }

    public function getIdCard(Request $request)
    {
       $year_id = $request->year_id ;
       $class_id = $request->class_id ;

       $checkData = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->first();
       if ($checkData == true)
       {
           $data['allData'] = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();
           $pdf = PDF::loadView('admin.report.id_card.pdf', $data);
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
        //
    }
}
