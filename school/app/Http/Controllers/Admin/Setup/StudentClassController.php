<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = StudentClass::all();
        return view('admin.setup.student_class.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setup.student_class.create');
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
            'name'=>'required|unique:student_classes,name'
        ]);
        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.student.class.view')->with('success','Logo Added Successfully');
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
        $editData= StudentClass::find($id);
        return view('admin.setup.student_class.create',compact('editData'));
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
        $data = StudentClass::find($id);
        $this->validate($request,[
            'name'=>'required|unique:student_classes,name'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('setups.student.class.view')->with('success','Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StudentClass::destroy($id);
        if($data)
        {
            return redirect()->route('setups.student.class.view')->with('error','Student class has been deleted');
        }
    }
}
