<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
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
        $data['allData']= User::where('usertype','employee')->get();
        return view('admin.employee.employee_salary.index',$data);
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
        $data['editData'] = User::find($id);
        $data['designations'] = Designation::all();
        return view('admin.employee.employee_salary.increment',$data);
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
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary+(float)$request->increment_salary;
        $user->salary = $present_salary ;
        $user->save();

        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $id ;
        $salaryData->previous_salary = $previous_salary;
        $salaryData->present_salary = $present_salary ;
        $salaryData->increment_salary = $request->increment_salary ;
        $salaryData->effected_date = date('Y-m-d',strtotime($request->effected_date));
        $salaryData->save();
        return redirect()->route('employees.salary.view')->with('success','Salary Increment successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =  User::destroy($id);
        //$notifications = array('message'=>'You Deleted these package','alert-type'=>'error');
        if($user)
        {
            return redirect()->route('users.view')->with('error','Delete these guy');
            //return redirect()->back()->with($notifications);
        }
    }

    public function details($id)
    {
        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id',$data['details']->id)->get();
       // dd($data['salary_log']->toArray());
        return view('admin.employee.employee_salary.details',$data);
    }

}
