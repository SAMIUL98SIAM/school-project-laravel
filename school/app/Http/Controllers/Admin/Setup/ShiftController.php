<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = StudentShift::all();
        return view('admin.setup.student_shift.index',$data);
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
        $this->validate($request,[
            'name'=>'required|unique:student_shifts,name'
        ]);
        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.student.shift.view')->with('success','School Shift Added Successfully');
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
       //
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

        $this->validate($request,[
            'name'=>'required|unique:student_shifts,name'
        ]);
        $class = StudentShift::find($id);
        $class->name = $request->name;
        $update_class  = $class->save();
        if($update_class)
        {
            return redirect()->route('setups.student.shift.view')->with('success','School Shift Updated Successfully');
        }
        else{
            return redirect()->route('setups.student.shift.view')->with('error','Updated same classs Year');
        }

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
