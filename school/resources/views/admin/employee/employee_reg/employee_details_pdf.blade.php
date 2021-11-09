<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Details</title>
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
                        <td class="text-center"> <img src="{{url('/school/public/upload/employee_image/'.$details->image)}}" style="width: 100px;height:100px;" alt=""> </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 text-center">
                <h5 style="font-weight: bold;padding-top:-25px">Employees Details</h5>
            </div>
            <div class="col-md-12">
                <table  border="1"  width="80%">
                    <tbody>
                        <tr>
                            <td style="width:50%">Employee Name</td>
                            <td>{{$details->name}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Father's Name</td>
                            <td>{{$details->fname}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Mother's Name</td>
                            <td>{{$details->mname}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">ID no</td>
                            <td>{{$details->id_no}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Mobile</td>
                            <td>{{$details->mobile}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Gender</td>
                            <td>{{$details->gender}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Address</td>
                            <td>{{$details->address}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Religion</td>
                            <td>{{$details->religion}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Designation</td>
                            <td>{{$details->designation['name']}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Join Date</td>
                            <td>{{date('d-m-Y',strtotime($details->join_date))}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">Date Of Birth</td>
                            <td>{{date('d-m-Y',strtotime($details->dob))}}</td>
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
                                <p style="text-align: center;">Principal/Headmaster</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
