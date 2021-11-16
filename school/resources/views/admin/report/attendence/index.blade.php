@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Attendence Report</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Attendence Report</li>
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
                    <h3 class="card-title">Select Critaria</h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <form method="GET" action="{{route('reports.attendence.get')}}" id="myForm" target="_blank">
                        <div class="row">
                            @csrf
                            <div class="col-4">
                                <label class="employee_id">Employee List</label>
                                <select name="employee_id" id="employee_id" class="form-control form-control-sm">
                                    <option value="">Select employee</option>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4">
                                <label class="date">Date</label>
                                <input type="text" name="date" class="singledatepicker form-control" id="date" placeholder="DD-MM-YYYY" readonly>
                            </div>
                            <div class="col-2" style="padding-top: 30px;">
                                <button type="submit" class="btn btn-primary" name="search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
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
          employee_id: {
              required: true,
          },
          date: {
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
@endsection

