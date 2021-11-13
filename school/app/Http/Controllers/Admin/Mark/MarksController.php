<?php

namespace App\Http\Controllers\Admin\Mark;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\Group;
use App\Models\StudentShift;
use App\Models\User;
use App\Models\Year;
use App\Models\StudentMarks;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;

class MarksController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['years'] = Year::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        // $data['groups'] = Group::all();
        // $data['shifts'] = StudentShift::all();
        return view('admin.mark.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studentcount = $request->student_id ;
        if($studentcount)
        {
            for ($i=0; $i <count($request->student_id) ; $i++) {
                $data = new StudentMarks();
                $data->year_id = $request->year_id ;
                $data->class_id = $request->class_id ;
                $data->assign_subject_id = $request->assign_subject_id ;
                $data->exam_type_id = $request->exam_type_id ;
                $data->year_id = $request->year_id ;
                $data->student_id = $request->student_id[$i] ;
                $data->id_no = $request->id_no[$i] ;
                $data->marks = $request->marks[$i] ;
                $data->save();
            }
        }
        return redirect()->route('marks.create')->with('success','Marks inserted successfully');
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
    public function edit()
    {
        //$data['editData']= AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        $data['years'] = Year::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        return view('admin.mark.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        StudentMarks::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->delete();
        $studentcount = $request->student_id ;
        if($studentcount)
        {
            for($i=0;$i<count($request->student_id);$i++)
            {
                $data = new StudentMarks();
                $data->year_id = $request->year_id ;
                $data->class_id = $request->class_id ;
                $data->assign_subject_id = $request->assign_subject_id ;
                $data->exam_type_id = $request->exam_type_id ;
                $data->year_id = $request->year_id ;
                $data->student_id = $request->student_id[$i] ;
                $data->id_no = $request->id_no[$i] ;
                $data->marks = $request->marks[$i] ;
                $data->save();
            }
        }
        return redirect()->route('marks.edit')->with('success','Marks Updated successfully');
    }


}
