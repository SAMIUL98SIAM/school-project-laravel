@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Employee</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Employee</li>
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
                    <h3>Employee List</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('employees.registration.create')}}"><i class="fa fa-plus-circle"> Add Employee</i></a>

                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Employee Name</th>
                                <th>ID No</th>
                                <th>Mobile Number</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Join Date</th>
                                <th>Salary</th>
                                @if(Auth::user()->role=="Admin")
                                    <th>Code</th>
                                @endif
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key=>$employee)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->id_no}}</td>
                                <td>{{$employee->mobile}}</td>
                                <td>{{$employee->address}}</td>
                                <td>{{$employee->gender}}</td>
                                <td>{{date('d-m-Y',strtotime($employee->join_date))}}</td>
                                <td>{{$employee->salary}}</td>
                                @if(Auth::user()->role=="Admin")
                                    <td>{{$employee->code}}</td>
                                @endif
                                <td>
                                    <a title="Edit" class="btn btn-sm btn-primary" href="{{route('employees.registration.edit',$employee->id)}}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
              unique:true,
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
@endsection
