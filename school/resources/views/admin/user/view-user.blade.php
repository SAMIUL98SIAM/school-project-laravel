@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manager User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
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
                    <h3>User List</h3>
                    <button class="btn btn-success float-right btn-sm" data-toggle="modal" data-target="#basicModal"><i class="fa fa-plus-circle">Add User</i></button>
                    <!--Create Modal--->
                    <div class="modal fade" id="basicModal">
                        <div style="color: #000" class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create User</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('users.store') }}" id="myForm">
                                        @csrf
                                        <div class="form-group">
                                            <label class="usertype">User Role</label>
                                            <select name="usertype" id="usertype" class="form-control">
                                                <option value="">Select Role</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Manager">Manager</option>
                                            </select>
                                            {{-- <font style="color:red;">
                                                {{($errors->has('usertype'))?($errors->first('usertype')):''}}
                                            </font> --}}
                                        </div>
                                        <div class="form-group">
                                            <label class="name">User Name</label>
                                            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="User Name">
                                            {{-- <font style="color:red;">
                                                {{($errors->has('name'))?($errors->first('name')):''}}
                                            </font> --}}
                                        </div>
                                        <div class="form-group">
                                            <label class="email">Email</label>
                                            <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                                            {{-- <font style="color:red;">
                                                {{($errors->has('email'))?($errors->first('email')):''}}
                                            </font> --}}
                                        </div>
                                        <div class="form-group">
                                            <label class="password">Password</label>
                                            <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control" placeholder="Password">
                                            {{-- <font style="color:red;">
                                                {{($errors->has('password'))?($errors->first('password')):''}}
                                            </font> --}}
                                        </div>
                                        <div class="form-group">
                                            <label class="password">Confirm Password</label>
                                            <input type="password" name="password2" id="password2" value="{{old('password2')}}" class="form-control" placeholder="Confirm Password">
                                            {{-- <font style="color:red;">
                                                {{($errors->has('password'))?($errors->first('password')):''}}
                                            </font> --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Create Modal/--->
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Role</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key=>$user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->usertype}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a title="Edit" class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                                    <a title="Delete" class="btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a>
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
