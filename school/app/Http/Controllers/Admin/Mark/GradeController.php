<?php

namespace App\Http\Controllers\Admin\Mark;

use App\Http\Controllers\Controller;
use App\Models\MarksGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData']= MarksGrade::all();
        // $data['allData']= User::all();
        return view('admin.mark.grade.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mark.grade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new MarksGrade;
        $data->grade_name = $request->grade_name ;
        $data->grade_point = $request->grade_point ;
        $data->start_marks = $request->start_marks ;
        $data->end_marks = $request->end_marks ;
        $data->start_point = $request->start_point ;
        $data->end_point = $request->end_point ;
        $data->remarks = $request->remarks ;
        $data->save();
        return redirect()->route('marks.grade.view')->with('success','Marks Added Successfully');
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
    public function edit($id)
    {
        $data['editData'] = MarksGrade::find($id);
        return view('admin.mark.grade.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editData= MarksGrade::find($id);
        $editData->grade_name = $request->grade_name ;
        $editData->grade_point = $request->grade_point ;
        $editData->start_marks = $request->start_marks ;
        $editData->end_marks = $request->end_marks ;
        $editData->start_point = $request->start_point ;
        $editData->end_point = $request->end_point ;
        $editData->remarks = $request->remarks ;
        $editData->save();
        return redirect()->route('marks.grade.view')->with('success','Marks updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
