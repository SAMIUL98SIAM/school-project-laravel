<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountEmployeeSalary;
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
class EmployeeSalaryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = AccountEmployeeSalary::all();
        return view('admin.account.employee_salary.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.account.employee_salary.create');
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

        AccountEmployeeSalary::where('date',$date)->delete();
        $checkdata = $request->checkmanage;
        if($checkdata!=null)
        {
            for ($i=0; $i <count($checkdata) ; $i++) {
                $data = new AccountEmployeeSalary();
                $data->date = $date;
                $data->employee_id = $request->employee_id[$checkdata[$i]];
                $data->amount = $request->amount[$checkdata[$i]];
                $data->save();
            }
        }
        if(!empty(@$data) || empty($checkdata))
        {
            return redirect()->route('accounts.salary.view')->with('success','Employee updated sucessfully');
        }
        else
        {
            return redirect()->back()->with('error','No Employee have saved');
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
}
