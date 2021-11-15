<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\Year;
use App\Models\Group;
use App\Models\User;
use App\Models\FeeCategory;
use App\Models\AccountStudentFee;
use App\Models\Logo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = AccountStudentFee::all();
        return view('admin.account.student_fee.index',$data);
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
        $data['fee_categories'] = FeeCategory::all();
        return view('admin.account.student_fee.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('Y-m',strtotime($request->date));
        //$date = $request->date;

        AccountStudentFee::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('fee_category_id',$request->fee_category_id)->where('date',$date)->delete();
        $checkdata = $request->checkmanage;
        if($checkdata!=null)
        {
            for ($i=0; $i <count($checkdata) ; $i++) {
                $data = new AccountStudentFee();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->date = $date;
                $data->fee_category_id = $request->fee_category_id;
                $data->student_id = $request->student_id[$checkdata[$i]];
                $data->amount = $request->amount[$checkdata[$i]];
                $data->save();
            }
        }
        if(!empty(@$data) || empty($checkdata))
        {
            return redirect()->route('accounts.fee.view')->with('success','Student Fee inserted sucessfully');
        }
        else
        {
            return redirect()->back()->with('error','No student have saved');
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
    public function edit($id)
    {
        $logo = Logo::find($id);
        return view('admin.logo.edit',compact('logo'));
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
        //
        return redirect()->route('logos.view')->with('success','Logo Updated Successfully');
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
