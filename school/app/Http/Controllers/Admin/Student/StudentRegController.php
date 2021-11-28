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

class StudentRegController extends Controller
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
        $data['year_id'] = Year::orderBy('id','desc')->first()->id ;
        $data['class_id'] = StudentClass::orderBy('id','asc')->first()->id ;
        $data['allData']= AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
        return view('admin.student.student_reg.index',$data);
    }

    public function yearClassWise(Request $request)
    {
        $data['years'] = Year::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = $request->year_id ;
        $data['class_id'] = $request->class_id;
        $data['allData']= AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        return view('admin.student.student_reg.index',$data);
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
        $data['groups'] = Group::all();
        $data['shifts'] = StudentShift::all();
        return view('admin.student.student_reg.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function() use($request){
            $checkYear = Year::find($request->year_id)->name ;
            $student = User::where('usertype','student')->orderBy('id','DESC')->first();
            if($student == NULL)
            {
                $firstReg = 0;
                $studentId = $firstReg+1;
                if($studentId < 10)
                {
                    $id_no= '000'.$studentId;
                }
                elseif($studentId < 100)
                {
                    $id_no= '00'.$studentId;
                }
                elseif($studentId < 1000)
                {
                    $id_no= '0'.$studentId;
                }
            }
            else
            {
                $student = User::where('usertype','student')->orderBy('id','DESC')->first()->id;
                $studentId = $student+1;
                if($studentId < 10)
                {
                    $id_no= '000'.$studentId;
                }
                elseif($studentId < 100)
                {
                    $id_no= '00'.$studentId;
                }
                elseif($studentId < 1000)
                {
                    $id_no= '0'.$studentId;
                }
            }
            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->usertype = 'student';
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->religion = $request->religion;
            $user->gender = $request->gender;
            $user->password = Hash::make($code);
            $user->code = $code;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_image'),$filename);
                $user['image'] = $filename;
            }
            $user->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id ;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id ;
            // $discount_student->fee_category_id = $request->fee_category_id ;
            $discount_student->fee_category_id = "1" ;
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });
        return redirect()->route('students.registration.view')->with('success','student inserted successfully');
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
    public function edit($student_id)
    {
        $data['editData']= AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        $data['years'] = Year::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['groups'] = Group::all();
        $data['shifts'] = StudentShift::all();
        return view('admin.student.student_reg.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student_id)
    {
        DB::transaction(function() use($request,$student_id){
            $user = User::where('id',$student_id)->first();
            $user->usertype = 'student';
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->religion = $request->religion;
            $user->gender = $request->gender;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/student_image/'.$user->imgae));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_image'),$filename);
                $user['image'] = $filename;
            }
            $user->save();

            $assign_student =AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
            $assign_student->student_id = $user->id ;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student =DiscountStudent::where('assign_student_id',$request->id)->first();
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });
        return redirect()->route('students.registration.view')->with('success','student updated successfully');
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

    public function getPromotion($student_id)
    {
        $data['promotionData']= AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        $data['years'] = Year::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['groups'] = Group::all();
        $data['shifts'] = StudentShift::all();
        return view('admin.student.student_reg.promotion',$data);
    }

    public function setPromotion(Request $request, $student_id)
    {
        DB::transaction(function() use($request,$student_id){
            $user = User::where('id',$student_id)->first();
            $user->usertype = 'student';
            // $user->name = $request->name;
            // $user->fname = $request->fname;
            // $user->mname = $request->mname;
            // $user->mobile = $request->mobile;
            // $user->address = $request->address;
            // $user->religion = $request->religion;
            // $user->gender = $request->gender;
            // $user->dob = date('Y-m-d',strtotime($request->dob));
            // if($request->file('image')){
            //     $file = $request->file('image');
            //     @unlink(public_path('upload/student_image/'.$user->imgae));
            //     $filename = date('YmdHi').$file->getClientOriginalName();
            //     $file->move(public_path('upload/student_image'),$filename);
            //     $user['image'] = $filename;
            // }
            $user->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $student_id ;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id ;
            $discount_student->fee_category_id = "1" ;
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });
        return redirect()->route('students.registration.view')->with('success','student promotion Success Fully successfully');
    }

    public function details($student_id)
    {
        $data['details'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        $pdf = PDF::loadView('admin.student.student_reg.student_details_pdf', $data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');
    }

}
