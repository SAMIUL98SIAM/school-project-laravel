<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Registration Fee</title>
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="80%">
                    <tr>
                        <td width="33%" class="text-center"> <img src="{{url('/upload/school.png')}}" style="width: 100px; height:100px" alt=""></td>
                        <td class="text-center" width="63%">
                            <h4><strong>Milestone School</strong></h4>
                            <h5><strong>Uttara,Dhaka</strong></h5>
                        </td>
                        <td class="text-center"> <img src="{{url('/school/public/upload/student_image/'.$details['student']['image'])}}" style="width: 100px;height:100px;" alt=""> </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 text-center">
                <h5 style="font-weight: bold;padding-top:-25px">Student Payslip(Student Copy)</h5>
            </div>
            <div class="col-md-12">
                @php
                    $registrationfee =
                    App\Models\FeeCategoryAmount::where('fee_category_id','1')->where('class_id',$details->class_id)->first();
                    $originalfee = $registrationfee->amount;
                    $discount = $details['discount']['discount'];
                    $discountablefee = $discount/100*$originalfee;
                    $finalfee = (float)$originalfee-(float)$discountablefee;
                @endphp
                <table  border="1"  width="80%">
                    <tbody>
                        <tr>
                            <td style="width:50%">ID no</td>
                            <td>{{$details['student']['id_no']}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Roll No</td>
                            <td>{{$details->roll}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Student Name</td>
                            <td>{{$details['student']['name']}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Father's Name</td>
                            <td>{{$details['student']['fname']}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Mother's Name</td>
                            <td>{{$details['student']['mname']}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Session</td>
                            <td>{{$details['year']['name']}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Class Name</td>
                            <td>{{$details['student_class']['name']}}</td>
                        </tr>


                        <tr>
                            <td style="width:50%">Registration Fee</td>
                            <td>{{$originalfee}} TK</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Discount Fee</td>
                            <td>{{$discount}}%</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Fee</td>
                            <td>{{$finalfee}} TK</td>
                        </tr>
                    </tbody>
                </table>
                <i style="font-size: 10px;float:right;">Print Date: {{date("d M Y")}}</i>
            </div>
            <div class="col-md-12">
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 30%"></td>
                            <td style="width: 30%"></td>
                            <td style="width: 40%">
                                <hr style="border: 1px solid #000; margin-bottom:0px;">
                                <p style="text-align: right; margin-left:10px;">Principal/Headmaster</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr style="border: dashed 1px; width: 96%; color:#DDD;margin-bottom:50px;">
        <div class="row">
            <div class="col-md-12">
                <table width="80%">
                    <tr>
                        <td width="33%" class="text-center"> <img src="{{url('/upload/school.png')}}" style="width: 100px; height:100px" alt=""></td>
                        <td class="text-center" width="63%">
                            <h4><strong>Milestone School</strong></h4>
                            <h5><strong>Uttara,Dhaka</strong></h5>
                        </td>
                        <td class="text-center"> <img src="{{url('/school/public/upload/student_image/'.$details['student']['image'])}}" style="width: 100px;height:100px;" alt=""> </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 text-center">
                <h5 style="font-weight: bold;padding-top:-25px">Student Payslip</h5>
            </div>
            <div class="col-md-12">
                @php
                    $registrationfee =
                    App\Models\FeeCategoryAmount::where('fee_category_id','1')->where('class_id',$details->class_id)->first();
                    $originalfee = $registrationfee->amount;
                    $discount = $details['discount']['discount'];
                    $discountablefee = $discount/100*$originalfee;
                    $finalfee = (float)$originalfee-(float)$discountablefee;
                @endphp
                <table  border="1"  width="80%">
                    <tbody>
                        <tr>
                            <td style="width:50%">ID no</td>
                            <td>{{$details['student']['id_no']}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Roll No</td>
                            <td>{{$details->roll}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Student Name</td>
                            <td>{{$details['student']['name']}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Father's Name</td>
                            <td>{{$details['student']['fname']}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Mother's Name</td>
                            <td>{{$details['student']['mname']}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Session</td>
                            <td>{{$details['year']['name']}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Class Name</td>
                            <td>{{$details['student_class']['name']}}</td>
                        </tr>


                        <tr>
                            <td style="width:50%">Registration Fee</td>
                            <td>{{$originalfee}} TK</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Discount Fee</td>
                            <td>{{$discount}}%</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Fee</td>
                            <td>{{$finalfee}} TK</td>
                        </tr>
                    </tbody>
                </table>
                <i style="font-size: 10px;float:right;">Print Date: {{date("d M Y")}}</i>
            </div>
            <div class="col-md-12">
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 30%"></td>
                            <td style="width: 30%"></td>
                            <td style="width: 40%">
                                <hr style="border: 1px solid #000; margin-bottom:0px;">
                                <p style="text-align: right;">Principal/Headmaster</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
