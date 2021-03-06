<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\AssignSubject;
use App\Models\Subject;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('admin.setup.assign_subject.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
        return view('admin.setup.assign_subject.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countSubject = count($request->subject_id);
        if($countSubject!=NULL)
        {
            for($i=0;$i<$countSubject;$i++)
            {
                $data = new AssignSubject();
                $data->class_id = $request->class_id ;
                $data->subject_id = $request->subject_id[$i] ;
                $data->full_mark = $request->full_mark[$i] ;
                $data->pass_mark = $request->pass_mark[$i] ;
                $data->get_mark = $request->get_mark[$i] ;
                $data->save();
            }
        }
        return redirect()->route('setups.assign.subject.view')->with('success','Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($class_id)
    {
        $data['editData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        return view('admin.setup.assign_subject.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($class_id)
    {
        $data['editData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
        return view('admin.setup.assign_subject.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_id)
    {
        if($request->subject_id==NULL)
        {
            return redirect()->back()->with('error','Sorry ! You dont have any subject');
        }
        else
        {

            AssignSubject::whereNotIn('subject_id',$request->subject_id)->where('class_id',$request->class_id)->delete();
            foreach($request->subject_id as $key=>$value)
            {
                $assign_subject_exist = AssignSubject::where('subject_id',$request->subject_id[$key])->where('class_id',$request->class_id)->first();
                if($assign_subject_exist)
                {
                    $assignSubjects = $assign_subject_exist;
                }
                else
                {
                    $assignSubjects = new AssignSubject();
                }
                $assignSubjects->class_id = $request->class_id ;
                $assignSubjects->subject_id = $request->subject_id[$key] ;
                $assignSubjects->full_mark = $request->full_mark[$key] ;
                $assignSubjects->pass_mark = $request->pass_mark[$key] ;
                $assignSubjects->get_mark = $request->get_mark[$key] ;
                $assignSubjects->save();
            }

            // AssignSubject::where('class_id',$class_id)->delete();
            // $countSubject = count($request->subject_id);
            // for($i=0;$i<$countSubject;$i++)
            // {
            //     $data = new AssignSubject();
            //     $data->class_id = $request->class_id ;
            //     $data->subject_id = $request->subject_id[$i] ;
            //     $data->full_mark = $request->full_mark[$i] ;
            //     $data->pass_mark = $request->pass_mark[$i] ;
            //     $data->get_mark = $request->get_mark[$i] ;
            //     $data->save();
            // }

        }
        return redirect()->route('setups.assign.subject.view')->with('success','Assign Subject Updated Successfully');
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
}
