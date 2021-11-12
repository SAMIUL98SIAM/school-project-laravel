<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use App\Models\DiscountStudent;
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

class DefaultController extends Controller
{
    public function getStudent(Request $request)
    {
        $year_id = $request->year_id ;
        $class_id = $request->class_id ;
        $allData = AssignStudent::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
        return response()->json($allData);
    }

    public function getSubject(Request $request)
    {
        $class_id = $request->class_id ;
        $allData = AssignSubject::with(['subject'])->where('class_id',$class_id)->get();
        return response()->json($allData);
    }
}
