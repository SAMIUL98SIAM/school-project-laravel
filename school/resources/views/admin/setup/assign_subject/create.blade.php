@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Assign Subject</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Assign Subject</li>
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
                       Add Assign Subject
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('setups.assign.subject.view')}}"><i class="fa fa-list"> Assign Subject List</i></a>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('setups.assign.subject.store') }}" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <div class="add_item">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <lebel>Fee Category</lebel>
                                            <select name="class_id" class="form-control">
                                                <option value="">Select Classes</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <lebel>Class</lebel>
                                            <select name="subject_id[]" class="form-control">
                                                <option value="">Select Subject</option>
                                                @foreach ($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <lebel>Full Mark</lebel>
                                            <input type="text" name="full_mark[]" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <lebel>Pass Mark</lebel>
                                            <input type="text" name="pass_mark[]" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <lebel>Get Mark</lebel>
                                            <input type="text" name="get_mark[]" class="form-control">
                                        </div>
                                        <div class="form-group col-md-1" style="padding-top: 24px;">
                                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2" style="padding-top: 30px;">
                                    <input type="submit" value="Submit" class="btn btn-primary">
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

    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <lebel>Subjects</lebel>
                        <select name="subject_id[]" class="form-control">
                            <option value="">Select Subjects</option>
                            @foreach ($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <lebel>Full Mark</lebel>
                        <input type="text" name="full_mark[]" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <lebel>Pass Mark</lebel>
                        <input type="text" name="pass_mark[]" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <lebel>Get Mark</lebel>
                        <input type="text" name="get_mark[]" class="form-control">
                    </div>
                    <div class="form-group col-md-2" style="padding-top: 23px;">
                        <div class="form-row">
                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){
        var counter = 0 ;
        $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click",".removeeventmore",function(event){
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1;
        });
    });
</script>

<script>
    $(function () {
      $('#myForm').validate({
        rules: {
        "class_id": {
              required: true,
          },
          "subject_id[]": {
              required: true,
          },
         "full_mark[]": {
            required: true,
          },
          "pass_mark[]": {
            required: true,
          },
          "get_mark[]": {
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

