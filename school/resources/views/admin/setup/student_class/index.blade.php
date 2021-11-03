@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Student Class</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Student Class</li>
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
                    <h3>Student Class List</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('setups.student.class.create')}}"><i class="fa fa-plus-circle">Create Student Class</i></a>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Class Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key=>$class)
                            <tr class="{{$class->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$class->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $key }}"><i class="fa fa-edit"></i> </button>
                                    <a title="Delete" href="{{route('setups.student.class.delete',$class->id)}}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash"></i></a>
                                </td>

                                {{--Edit Modal--}}
                                    <div style="color: #000" class="modal fade" id="editModal{{ $key }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Student Class</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('setups.student.class.update',$class->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label class="name">Name</label>
                                                            <input type="text" name="name" class="form-control" required="" value="{{ $class->name }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--Edit Modal--}}

                               {{-- </td>
                                    <a title="Edit" href="{{route('setups.student.class.edit',$class->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a title="Delete" href="{{route('setups.student.class.delete')}}" class="btn btn-sm btn-danger" id="delete" data-token="{{csrf_token()}}" data-id="{{$class->id}}"><i class="fas fa-trash"></i></a>
                                </td>--}}
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
         usertype: {
              required: true,
          },
          name: {
              required: true,
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 6
          },
          password2: {
              required: true,
              equalTo: '#password'
          }

        },
        messages: {
          usertype: {
            required: "Please select a usertype",
          },
          name: {
            required: "Please enter a name",
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          password: {
            required: "Please enter a password",
            minlength: "Your password must be at least 6 characters long"
          },
          password2: {
            required: "Please enter a confirm password",
            equalTo: "Confirm password doesn't match"
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
