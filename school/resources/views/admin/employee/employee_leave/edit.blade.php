@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Employee Leave</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Employee Leave</li>
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
                    <h3>
                       Add Employee Leave
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('employees.leave.view')}}"><i class="fa fa-list"> Employee Leave List</i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                           <form method="post" action="{{ route('employees.leave.update',$editData->id) }}" id="myForm" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-4">
                                    <label class="employee_id">Employee Name <font style="color: red">*</font></label>
                                    <select name="employee_id" id="employee_id" class="form-control form-control-sm">
                                        <option value="">Select Employee</option>
                                        @foreach($employees as $employee)
                                        <option value="{{$employee->id}}" {{(@$editData->employee_id == $employee->id)?'selected':''}}>{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="start_date">Start Date: <font style="color: red">*</font></label>
                                    <input type="date" id="start_date" name="start_date" value="{{$editData->start_date}}" class="form-control form-control-sm">
                                </div>
                                <div class="col-4">
                                    <label for="end_date">End Date: <font style="color: red">*</font></label>
                                    <input type="date" id="end_date" name="end_date" value="{{$editData->end_date}}"  class="form-control form-control-sm">
                                </div>
                                <div class="col-4">
                                    <label class="leave_purpose_id">Leave Purpose <font style="color: red">*</font></label>
                                    <select name="leave_purpose_id" id="leave_purpose_id" class="form-control form-control-sm">
                                        <option value="">Select leave_purposes</option>
                                        @foreach($leave_purposes as $leave_purpose)
                                            <option value="{{$leave_purpose->id}}" {{(@$editData->leave_purpose_id == $leave_purpose->id?'selected':'')}}>{{$leave_purpose->name}}</option>
                                        @endforeach
                                        <option value="0">New Purpose</option>
                                    </select>
                                    <input type="text" name="name" class="form-control form-control-sm" placeholder="Write Purpose" id="add_others" style="display: none;">
                                </div>
                                <div class="col-2" style="padding-top: 30px;">
                                    <input type="submit" value="Update" class="btn btn-primary btn-sm">
                                </div>
                            </div>
                         </form>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div><!-- /.card-body -->
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
          name: {
              required: true,
          },
          employee_id: {
              required: true,
          },
          start_date: {
              required: true,
          },
          end_date: {
              required: true,
          },
          leave_purpose_id: {
              required: true,
          },
        },
        messages: {

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
        $(document).ready(function()
        {
            $(document).on('change','#leave_purpose_id',function(){
                var leave_purpose_id = $(this).val();
                if(leave_purpose_id == '0')
                {
                    $('#add_others').show();
                }
                else
                {
                    $('#add_others').hide();
                }
            });
        });
    </script>
@endsection
