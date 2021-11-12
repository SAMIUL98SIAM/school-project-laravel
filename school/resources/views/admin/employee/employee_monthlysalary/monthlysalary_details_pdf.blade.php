<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monthly Salary</title>
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
        @php
        $date = date('Y-m',strtotime($totalattendgroupbyid['0']->date ));
           if($date != '')
           {
               $where[] = ['date','like',$date.'%'] ;
           }
           //$where[] = ['st']
           $totalattend = App\Models\EmployeeAttendence::with(['user'])->where($where)->where('employee_id',$totalattendgroupbyid['0']->employee_id)->get();
           $salary = (float)$totalattendgroupbyid['0']['user']['salary'];
           $salaryperday = (float)$salary/30;
           $absentcount = count($totalattend->where('attend_status','Absent'));
           $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
           $totalsalary = (float)$salary-(float)$totalsalaryminus;
        @endphp
        <div class="row">
            <div class="col-md-12">
                <table width="80%">
                    <tr>
                        <td width="33%" class="text-center"> <img src="{{url('/upload/school.png')}}" style="width: 100px; height:100px" alt=""></td>
                        <td class="text-center" width="63%">
                            <h4><strong>Milestone School</strong></h4>
                            <h5><strong>Uttara,Dhaka</strong></h5>
                        </td>
                        <td class="text-center"> <img src="{{ (!empty($totalattendgroupbyid['0']['user']['image'])) ?url('/school/public/upload/employee_image/'.$totalattendgroupbyid['0']['user']['image']):url('/upload/no_image.jpg')}}" style="width: 100px;height:100px;" alt=""> </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 text-center">
                <h5 style="font-weight: bold;padding-top:-25px">Student Exam Fee Payslip</h5>
            </div>
            <div class="col-md-12">
                <table  border="1"  width="80%">
                    <tbody>
                        <tr>
                            <td style="width:50%">Employee Name</td>
                            <td>{{$totalattendgroupbyid['0']['user']['name']}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Total Salary</td>
                            <td>{{$totalattendgroupbyid['0']['user']['salary']}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Total Absent For this Month</td>
                            <td>{{$absentcount}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Month</td>
                            <td>{{date('M Y',strtotime($totalattendgroupbyid['0']->date))}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Salary OF this Month</td>
                            <td>{{$totalsalary}}</td>
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
                                <p style="text-align:center;">Principal/Headmaster</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
