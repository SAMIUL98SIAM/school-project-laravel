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
                        Student Promotion
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('students.registration.view')}}"><i class="fa fa-list"> Student List</i></a>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                           {{-- {{route('students.registration.update',$editData->student->id)}} --}}
                           <form method="post" action="{{route('students.registration.setPromotion',$promotionData->student_id)}}" id="myForm" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <input type="hidden" name="id" value="{{$promotionData->id}}">
                                <div class="col-4">
                                    <label class="name">Student Name <font style="color: red">*</font></label>
                                    <input type="text" name="name" value="{{$promotionData['student']['name']}}" class="form-control form-control-sm" id="name">
                                </div>

                                <div class="col-4">
                                    <label class="discount">Discount <font style="color: red">*</font></label>
                                    <input type="text" name="discount" value="{{$promotionData['discount']['discount']}}" class="form-control form-control-sm" id="discount">
                                </div>
                                <div class="col-4">
                                    <label class="year_id">Year <font style="color: red">*</font></label>
                                    <select name="year_id" id="year_id" class="form-control form-control-sm">
                                        <option value="">Select Year</option>
                                        @foreach($years as $year)
                                            <option value="{{$year->id}}" {{(@$promotionData->year_id==$year->id)?'selected':''}}>{{$year->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="class_id">Class <font style="color: red">*</font></label>
                                    <select name="class_id" id="class_id" class="form-control form-control-sm">
                                        <option value="">Select class</option>
                                        @foreach($classes as $class)
                                            <option value="{{$class->id}}" {{(@$promotionData->class_id==$class->id)?'selected':''}}>{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="group_id">Group</label>
                                    <select name="group_id" id="group_id" class="form-control form-control-sm">
                                        <option value="">Select group</option>
                                        @foreach($groups as $group)
                                            <option value="{{$group->id}}" {{(@$promotionData->group_id==$group->id)?'selected':''}}>{{$group->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="shift_id">Shift</label>
                                    <select name="shift_id" id="shift_id" class="form-control form-control-sm">
                                        <option value="">Select Shift</option>
                                        @foreach($shifts as $shift)
                                            <option value="{{$shift->id}}" {{(@$promotionData->shift_id==$shift->id)?'selected':''}}>{{$shift->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-8" style="padding-top: 10px;">
                                    <img id="showImage" src="{{!empty($promotionData->student->image) ? url('/school/public/upload/student_image/'.$promotionData->student->image):url('/upload/no_image.jpg')}}" alt="User profile picture" style="width:300px; height:110px; border:1px solid #000;">
                                </div>
                            </div>

                            <div class="col-2" style="padding-top: 30px;">
                                <input type="submit" value="Promotion" class="btn btn-primary btn-sm">
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
