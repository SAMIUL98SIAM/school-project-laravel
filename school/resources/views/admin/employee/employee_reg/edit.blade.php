@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Student</h1>
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
                    <h3>
                       Edit Employee
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('employees.registration.view')}}"><i class="fa fa-list"> Employee List</i></a>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                           {{-- {{route('students.registration.update',$editData->student->id)}} --}}
                           <form method="post" action="{{route('employees.registration.update',$editData->id)}}" id="myForm" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-4">
                                    <label class="name">Employee Name <font style="color: red">*</font></label>
                                    <input type="text" name="name" value="{{$editData->name}}"  class="form-control form-control-sm" id="name">
                                </div>
                                <div class="col-4">
                                    <label class="fname">Father's Name <font style="color: red">*</font></label>
                                    <input type="text" name="fname" value="{{$editData->fname}}" class="form-control form-control-sm" id="fname">
                                </div>
                                <div class="col-4">
                                    <label class="mname">Mother's Name <font style="color: red">*</font></label>
                                    <input type="text" name="mname" value="{{$editData->mname}}" class="form-control form-control-sm" id="mname">
                                </div>
                                <div class="col-4">
                                    <label class="mobile">Mobile Number <font style="color: red">*</font></label>
                                    <input type="text" name="mobile" value="{{$editData->mobile}}" class="form-control form-control-sm" id="mobile">
                                </div>
                                <div class="col-4">
                                    <label class="address">Address <font style="color: red">*</font></label>
                                    <input type="text" name="address" value="{{$editData->address}}" class="form-control form-control-sm" id="address">
                                </div>
                                <div class="col-4">
                                    <label class="gender">Gender <font style="color: red">*</font></label>
                                    <select name="gender" id="gender" class="form-control form-control-sm">
                                        <option value="">Select Gender</option>
                                        <option value="Male" {{(@$editData->gender == 'Male')?'selected':''}}>Male</option>
                                        <option value="Female" {{(@$editData->gender == 'Female')?'selected':''}}>Female</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="religion">Religion <font style="color: red">*</font></label>
                                    <select name="religion" id="religion" class="form-control form-control-sm">
                                        <option value="">Select Religion</option>
                                        <option value="Islam" {{(@$editData->religion == 'Islam')?'selected':''}}>Islam</option>
                                        <option value="Hindu" {{(@$editData->religion == 'Hindu')?'selected':''}}>Hindu</option>
                                        <option value="Christian" {{(@$editData->religion == 'Christian')?'selected':''}}>Christian</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="dob">Date Of Birth: <font style="color: red">*</font></label>
                                    <input type="date" id="dob" name="dob" value="{{$editData->dob}}" class="form-control form-control-sm">
                                </div>
                                <div class="col-3">
                                    <label class="designation_id">Designation <font style="color: red">*</font></label>
                                    <select name="designation_id" id="designation_id" class="form-control form-control-sm">
                                        <option value="">Select Designations</option>
                                        @foreach($designations as $designation)
                                            <option value="{{$designation->id}}" {{(@$editData->designation_id == $designation->id)?'selected':''}}>{{$designation->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label class="image">Image</label>
                                    <input type="file" name="image" class="form-control form-control-sm" id="image">
                                </div>
                                <div class="col-3" style="padding-top: 10px;">
                                    <img id="showImage" src="{{!empty($editData->image) ? url('/school/public/upload/employee_image/'.$editData->image):url('/upload/no_image.jpg')}}" alt="User profile picture" style="width:100px; height:110px; border:1px solid #000;">
                                </div>
                            </div>
                            <div class="col-2" style="padding-top: 30px;">
                                <input type="submit" value="Update" class="btn btn-primary btn-sm">
                            </div>
                         </form>
                        {{-- <div class="row"> --}}
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
          fname: {
              required: true,
          },
          mname: {
              required: true,
          },
          mobile: {
              required: true,
          },
          address: {
              required: true,
          },
          gender: {
              required: true,
          },
          religion: {
              required: true,
          },
          dob: {
              required: true,
          },
          discount: {
              required: true,
          },
          year_id: {
              required: true,
          },
          class_id: {
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
