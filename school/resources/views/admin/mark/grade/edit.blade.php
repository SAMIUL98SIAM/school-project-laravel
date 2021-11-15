@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Grade Point</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Grade Point</li>
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
                       Add Grade Point
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('marks.grade.view')}}"><i class="fa fa-list"> Grade Point List</i></a>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                           <form method="post" action="{{ route('marks.grade.update',$editData->id) }}" id="myForm" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-4">
                                    <label class="grade_name">Grade Name</label>
                                    <input type="text" name="grade_name" value="{{$editData->grade_name}}" class="form-control form-control-sm" id="grade_name">
                                </div>
                                <div class="col-4">
                                    <label class="grade_point">Grade Point</label>
                                    <input type="text" name="grade_point" value="{{$editData->grade_point}}" class="form-control form-control-sm" id="grade_point">
                                </div>
                                <div class="col-4">
                                    <label class="start_marks">Start Mark</label>
                                    <input type="text" name="start_marks" value="{{$editData->start_marks}}" class="form-control form-control-sm" id="start_marks">
                                </div>
                                <div class="col-4">
                                    <label class="end_marks">End Marks</label>
                                    <input type="text" name="end_marks" value="{{$editData->end_marks}}" class="form-control form-control-sm" id="end_marks">
                                </div>
                                <div class="col-4">
                                    <label class="start_point">Start Point</label>
                                    <input type="text" name="start_point" value="{{$editData->start_point}}" class="form-control form-control-sm" id="start_point">
                                </div>

                                <div class="col-4">
                                    <label class="end_point">End Point</label>
                                    <input type="text" name="end_point" value="{{$editData->end_point}}" class="form-control form-control-sm" id="end_point">
                                </div>
                                <div class="col-4">
                                    <label class="remarks">Remarks</label>
                                    <input type="text" name="remarks" value="{{$editData->remarks}}" class="form-control form-control-sm" id="remarks">
                                </div>
                            </div>

                            <div class="col-2" style="padding-top: 30px;">
                                <input type="submit" value="Update" class="btn btn-primary btn-sm">
                            </div>
                         </form>

                        <!-- /.card-body -->
                      </div>
                   </div><!-- /.card-body -->
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
          grade_name: {
              required: true,
          },
          grade_point: {
              required: true,
          },
          start_marks: {
              required: true,
          },
          end_marks: {
              required: true,
          },
          start_point: {
              required: true,
          },
          end_point: {
              required: true,
          },
          remarks: {
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
