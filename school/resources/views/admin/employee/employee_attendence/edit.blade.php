@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{asset('/admin/css/attend.css')}}">
<link rel="stylesheet" href="{{asset('/admin/css/attend1.css')}}">
@endsection

@section('content')


<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Employee Attendence</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Employee Attendence</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Attendence List</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('employees.attendence.view')}}"><i class="fa fa-list"> Employee Attendence List</i></a>
                </div><!-- /.card-header -->
                <form method="post" action="{{route('employees.attendence.store')}}" id="myForm">
                    @csrf
                    <div class="card-body">
                        <div class="form-group col-md-4">
                            <label for="date">Attendence Date: <font style="color: red">*</font></label>
                            <input type="text" id="date" name="date" value="{{date('d-m-Y',strtotime($editData['0']['date']))}}" class="checkdate form-control form-control-sm" readonly>
                        </div>
                        <table class="table-sm table-bordered table-striped dt-responsive" style="width: 100%">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">SL.</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Name</th>
                                    <th colspan="3" class="text-center" style="vertical-align: middle; width:25%;">Attendence Status</th>
                                </tr>
                                <tr>
                                    <th class="text-center btn present_all" style="display:table-cell; background-color:#114190;">Present</th>
                                    <th class="text-center btn absent_all" style="display:table-cell; background-color:#114190;">Abesent</th>
                                    <th class="text-center btn leave_all" style="display:table-cell; background-color:#114190;">Leave</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($editData as $key=>$employee)
                                    <tr id="div{{$employee->id}}" class="text-center">
                                        <input type="hidden" name="employee_id[]" value="{{$employee->employee_id}}" class="employee_id">
                                        <td>{{$key+1}}</td>
                                        <td>{{$employee->user->name}}</td>
                                        <td colspan="3">
                                            <div class="switch-toggle switch-3 switch-candy">
                                                <input class="present" id="present{{$key}}" name="attend_status{{$key}}" value="Present" type="radio"{{$employee->attend_status == 'Present'?'checked':''}}/>
                                                <label for="present{{$key}}">Present</label>

                                                <input class="absent" id="absent{{$key}}" name="attend_status{{$key}}" value="Absent" type="radio"{{$employee->attend_status == 'Absent'?'checked':''}}/>
                                                <label for="absent{{$key}}">Absent</label>

                                                <input class="leave" id="leave{{$key}}" name="attend_status{{$key}}" value="Leave" type="radio"{{$employee->attend_status == 'Leave'?'checked':''}}/>
                                                <label for="leave{{$key}}">Leave</label>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table><br>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')
<script>
    $(function () {
      $('#myForm').validate({
        rules: {
          date: {
              required: true,

          },
        },
        messages: {
          name: {
            required: "Please enter Employee a name",
            unique: "Already exists in the table",
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
     <script type="text/javascript">
        $(document).on('click','.present',function(){
            $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
        });
        $(document).on('click','.leave',function(){
            $(this).parents('tr').find('.datetime').css('pointer-events','').css('background-color','white').css('color','#495057');
        });
        $(document).on('click','.absent',function(){
            $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#dee2e6');
        });
    </script>
    <script type="text/javascript">
        $(document).on('click','.present_all',function(){
            $("input[value=Present]").prop('checked',true);
            $('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
        });
        $(document).on('click','.leave_all',function(){
            $("input[value=Leave]").prop('checked',true);
            $('.datetime').css('pointer-events','').css('background-color','white').css('color','#495057');
        });
        $(document).on('click','.absent_all',function(){
            $("input[value=Absent]").prop('checked',true);
            $('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#dee2e6');
        });

    </script>
@endsection
