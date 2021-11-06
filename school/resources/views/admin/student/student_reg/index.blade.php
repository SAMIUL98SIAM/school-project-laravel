@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Students</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Student</li>
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
                        <h3>Student List</h3>
                        <a class="btn btn-success float-right btn-sm" href="{{route('students.registration.create')}}"><i class="fa fa-plus-circle">Create Student</i></a>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <form method="GET" action="{{route('students.year.class.wise')}}" id="myForm">
                            <div class="form-row">
                                <div class="col-4">
                                    <label class="year_id">Year <font style="color: red">*</font></label>
                                    <select name="year_id" id="year_id" class="form-control form-control-sm">
                                        <option value="">Select Year</option>
                                        @foreach($years as $year)
                                            <option value="{{$year->id}}" {{(@$year_id == $year->id)?"selected":""}}>{{$year->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="class_id">Class <font style="color: red">*</font></label>
                                    <select name="class_id" id="class_id" class="form-control form-control-sm">
                                        <option value="">Select class</option>
                                        @foreach($classes as $class)
                                            <option value="{{$class->id}}" {{(@$class_id == $class->id)?"selected":""}}>{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4" style="padding-top: 30px;">
                                    <button type="submit" class="btn btn-primary btn-sm" name="search">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        @if(!@$search)
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="7%">Serial</th>
                                    <th>Name</th>
                                    <th>ID No</th>
                                    <th>Roll</th>
                                    <th>Year</th>
                                    <th>Class</th>
                                    <th>Image</th>
                                    @if(Auth::user()->role=="Admin")
                                    <th>Code</th>
                                    @endif
                                    <th width="12%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $key=>$data)
                                <tr class="{{$data->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->student['name']}}</td>
                                    <td>{{$data->student['id_no']}}</td>
                                    <td>{{$data->roll}}</td>
                                    <td>{{$data->year['name']}}</td>
                                    <td>{{$data->student_class['name']}}</td>
                                    <td><img src="{{!empty($data->student->image) ? url('/school/public/upload/student_image/'.$data->student->image):url('/upload/no_image.jpg')}}" width="70px" height="80px"></td>
                                    @if(Auth::user()->role=="Admin")
                                        <td>{{$data->student['code']}}</td>
                                    @endif
                                    <td>
                                        <a type="button" href="{{route('students.registration.edit',$data->student_id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="7%">Serial</th>
                                    <th>Name</th>
                                    <th>ID No</th>
                                    <th>Roll</th>
                                    <th>Year</th>
                                    <th>Class</th>
                                    <th>Image</th>
                                    @if(Auth::user()->role=="Admin")
                                    <th>Code</th>
                                    @endif
                                    <th width="12%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $key=>$data)
                                <tr class="{{$data->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->student['name']}}</td>
                                    <td>{{$data->student['id_no']}}</td>
                                    <td>{{$data->roll}}</td>
                                    <td>{{$data->year['name']}}</td>
                                    <td>{{$data->student_class['name']}}</td>
                                    <td><img src="{{!empty($data->student->image) ? url('/school/public/upload/student_image/'.$data->student->image):url('/upload/no_image.jpg')}}" width="70px" height="80px"></td>
                                    @if(Auth::user()->role=="Admin")
                                        <td>{{$data->student['code']}}</td>
                                    @endif
                                    <td>
                                        <a type="button" href="{{route('students.registration.edit',$data->student_id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
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
         "class_id": {
              required: true,
          },
          "year_id": {
              required: true,
          }
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
