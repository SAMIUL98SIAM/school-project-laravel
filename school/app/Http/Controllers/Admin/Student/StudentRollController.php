<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\Group;
use App\Models\StudentShift;
use App\Models\User;
use App\Models\Year;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class StudentRollController extends Controller
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
        return view('admin.student.roll_generate.index',$data);
    }

    public function get(Request $request)
    {
        $allData = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        return response()->json($allData);
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
    public function store(Request $request)
    {
        $year_id = $request->year_id ;
        $class_id = $request->class_id ;
        if($request->student_id != Null)
        {
            for ($i=0; $i <count($request->student_id) ; $i++) {
                AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll'=> $request->roll[$i]]);
            }
        }
        else
        {
            return redirect()->back()->with('error','!There are no Stdudent');
        }
        return redirect()->route('students.roll.view')->with('success','Successfully Roll Generated');
    }
}
