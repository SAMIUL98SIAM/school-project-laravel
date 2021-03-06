<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <link rel="stylesheet" href="{{asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style type="text/css">
        table{
            border-collapse: collapse;
        }
        h2 h3{
            margin: 0;
            padding: 0;
        }
        .table{
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }
        .table th, .table td{
            padding: 0.7rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .table thead th{
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }
        .table .table{
            background-color: #fff;
        }
        .table-bordered{
            border: 1px solid #dee2e6;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }
        .table-bordered thead th, .table-bordered thead td{
            border-bottom-width: 2px;
        }
        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }
        table tr td{
            padding: 5px;
        }
        .table-bordered thead th , .table-bordered td, .table-bordered th{
            border: 1px solid black !important;
        }
        .table-bordered thead th{
            background-color: #cacaca
        }
    </style>
</head>
<body>

    <section class="content">
        <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-md-12">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                    <div class="card-body">
                        <div style="border: 2px solid #000;;padding:7px;">
                            <div class="row">
                                <div style="float: right;" class="col-md-2 text-center">
                                    <img src="{{url('/upload/school.png')}}" style="width: 100px; height:100px;float: right;" alt="">
                                </div>
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-4 text-center" style="float: left;">
                                    <h4><strong>Milestone School</strong></h4>
                                    <h6><strong>Uttara,Dhaka</strong></h6>
                                    <h5><strong><u><i>Uttara,Dhaka</i></u></strong></h5>
                                    <h6><strong>{{$allMarks['0']['exam_type']['name']}}</strong></h6>
                                </div>
                            </div><br/>

                            <div class="col-md-12">
                                <hr style="border: solid 1px; width:100%; color:#DDD;margin-bottom:0px;"/>
                                <p style="text-align: right;"> <u><i>Print date: </i>{{date("d M Y")}}</u></p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <table  border="2"  width="100%" cellpadding="9" cellspacing="2">
                                        <tbody>
                                            @php
                                                $assign_student = App\Models\AssignStudent::where('year_id',$allMarks['0']->year_id)->where('class_id',$allMarks['0']->class_id)->first();
                                            @endphp
                                            <tr>
                                                <td style="width:50%">Student ID</td>
                                                <td style="width:50%">{{$allMarks['0']['id_no']}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:50%">Roll No</td>
                                                <td style="width:50%">{{$assign_student->roll}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:50%">Name</td>
                                                <td style="width:50%">{{$allMarks['0']['student']['name']}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:50%">Class</td>
                                                <td style="width:50%">{{$allMarks['0']['student_class']['name']}}</td>
                                            </tr>

                                            <tr>
                                                <td style="width:50%">Session</td>
                                                <td style="width:50%">{{$allMarks['0']['year']['name']}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table border="1" width="100%" cellpadding="1" cellspacing="1" class="text-center">
                                        <thead>
                                            <tr>
                                                <th>Letter Grade</th>
                                                <th>Marks Intervals</th>
                                                <th>Grade Point</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allGrades as $mark)
                                                <tr>
                                                    <td>{{$mark->grade_name}}</td>
                                                    <td>{{$mark->start_marks}}  -  {{$mark->end_marks}}</td>
                                                    <td>{{number_format((float)$mark->grade_point,2)}}  -  {{ ($mark->grade_point==5) ? (number_format((float)$mark->grade_point,2)) : (number_format((float)$mark->grade_point+1,2))}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div><br/>

                            </div><br/>


                            <div class="row">
                                <div class="col-md-12">
                                    <table  border="2"  width="100%" cellpadding="1" cellspacing="1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">SL</th>
                                                <th class="text-center">Subjects</th>
                                                <th class="text-center">Full Marks</th>
                                                <th class="text-center">Get Marks</th>
                                                <th class="text-center">Letter Grade</th>
                                                <th class="text-center">Grade Point</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_marks = 0 ;
                                                $total_point = 0 ;
                                            @endphp
                                            @foreach ($allMarks as $key => $mark)
                                            @php
                                                $get_mark = $mark->marks ;
                                                $total_marks = (float)$total_marks+(float)$get_mark;
                                                $total_subject = App\Models\StudentMarks::where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->get()->count();
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td class="text-center">{{$mark['assign_subject']['subject']['name']}}</td>
                                                <td class="text-center">{{$mark['assign_subject']['full_mark']}}</td>
                                                <td class="text-center">{{$get_mark}}</td>
                                                @php
                                                $grade_marks =  App\Models\MarksGrade::where([['start_marks','<=',(int)$get_mark],['end_marks','>=',(int)$get_mark]])->first();
                                                    $grade_name = $grade_marks->grade_name;
                                                    $grade_point = number_format((float)$grade_marks->grade_point,2);
                                                    $total_point = (float)$total_point+(float)$grade_point ;
                                                @endphp
                                                <td class="text-center">{{$grade_name}}</td>
                                                <td class="text-center">{{$grade_point}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3"><strong style="padding-left: 30px;">Total Marks</strong></td>
                                                <td colspan="3" style="padding-left: 37px;"><strong>{{$total_marks}}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><br/>

                            <div class="row">
                                <div class="col-md-12">
                                    <table  border="2"  width="100%" cellpadding="1" cellspacing="1">
                                        <tbody>
                                            @php
                                                $total_grade = 0;
                                                $points_for_letter_grade = (float)$total_point/(float)$total_subject ;
                                                $total_grade = App\Models\MarksGrade::where([['start_point','<=',(int)$points_for_letter_grade],['end_point','>=',(int)$points_for_letter_grade]])->first();

                                                $grade_point_avg = (float)$total_point/(float)$total_subject ;
                                            @endphp
                                            <tr>
                                                <td width="50%"><strong>Grade Point Average </strong></td>
                                                <td width="50%">
                                                    @if ($count_fail > 0)
                                                    0.00
                                                    @else
                                                        {{number_format((float)$grade_point_avg,2)}}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%"><strong>Letter Grade </strong></td>
                                                <td width="50%">
                                                    @if($count_fail > 0)
                                                    F
                                                    @else
                                                        {{$total_grade->grade_name}}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%">Total Marks with Fraction </td>
                                                <td width="50%"> <strong>{{$total_marks}}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><br/>

                            <div class="row">
                                <div class="col-md-12">
                                    <table  border="2"  width="100%" cellpadding="10" cellspacing="2">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: left;">
                                                    <strong>Remarks: </strong>
                                                    @if ($count_fail > 0)
                                                    Fail
                                                    @else
                                                    {{$total_grade->remarks}}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><br/>

                            <div class="row">
                                <div class="col-md-4">
                                    <hr style="border: solid 1px; width:60%; color:#000; margin-bottom: -3px;">
                                    <div class="text-center">Teacher</div>
                                </div>
                                <div class="col-md-4">
                                    <hr style="border: solid 1px; width:60%; color:#000; margin-bottom: -3px;">
                                    <div class="text-center">Parents/Guardian</div>
                                </div>
                                <div class="col-md-4">
                                    <hr style="border: solid 1px; width:60%; color:#000; margin-bottom: -3px;">
                                    <div class="text-center">Principal</div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
        </div>
        </div>
    </section>




</body>




</html>
