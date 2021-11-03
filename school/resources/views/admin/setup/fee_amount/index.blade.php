@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Fee Category Amount</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Fee Amount</li>
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
                    <h3>Fee Amount List</h3>
                    <a href="{{route('setups.fee.amount.create')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"> Add Fee Amount</i></a>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Fee Category</th>
                                {{-- <th>Class</th> --}}
                                {{-- <th>Amount</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key=>$data)
                            <tr>
                                <td>{{$key+1}}</td>
                                {{-- <td>{{$data->fee_category_id}}</td>
                                <td>{{$data->class_id}}</td> --}}
                                <td>{{$data->fee_category['name']}}</td>
                                {{-- <td>{{$data->student_class->name}}</td> --}}
                                {{-- <td>{{$data['amount']}}</td> --}}
                                <td>
                                    <a href="{{route('setups.fee.amount.details',$data->fee_category_id)}}" title="Details" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a href="">
                                    <a href="{{route('setups.fee.amount.edit',$data->fee_category_id)}}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a href="">
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
            required: "Please enter Fee category name",
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
