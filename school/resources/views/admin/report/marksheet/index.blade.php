@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Marksheet Generate</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Marksheet Generate</li>
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
                        <h3>Search Criteria</h3>
                    </div><!-- /.card-header -->


                    <div class="card-body">
                        <form method="GET" action="{{route('reports.marksheet.pdf')}}" id="myForm" target="_blank">
                            <div class="form-row">
                                <div class="col-3">
                                    <label class="year_id">Year </label>
                                    <select name="year_id" id="year_id" class="form-control form-control-sm">
                                        <option value="">Select Year</option>
                                        @foreach($years as $year)
                                            <option value="{{$year->id}}">{{$year->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label class="class_id">Class</label>
                                    <select name="class_id" id="class_id" class="form-control form-control-sm">
                                        <option value="">Select class</option>
                                        @foreach($classes as $class)
                                            <option value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label class="exam_type_id">Exam type</label>
                                    <select name="exam_type_id" id="exam_type_id" class="form-control form-control-sm">
                                        <option value="">Select Exam</option>
                                        @foreach($exam_types as $exam_type)
                                            <option value="{{$exam_type->id}}">{{$exam_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="col-3">
                                    <label>ID No</label>
                                    <input type="text" name="id_no"  id="id_no" class="form-control form-control-sm">
                                </div> --}}
                                <div class="col-3">
                                    <label>Student ID Select <font style="color: red">*</font></label>
                                    <select name="id_no" id="id_no" class="form-control form-control-sm">
                                     <option value="">Select ID</option>
                                    </select>
                                </div>
                                <div class="col-3" style="padding-top: 30px;">
                                    <button class="btn btn-primary btn-sm" type="submit" id="search" name="search">Search</button>
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

    <script type="text/javascript">
        $(function(){
            $(document).on('change','#class_id,#year_id',function(){
                var class_id = $('#class_id').val();
                var year_id = $('#year_id').val();
                $.ajax({
                    url:"{{route('get-student')}}",
                    type: "GET",
                    data: {class_id:class_id,year_id:year_id},
                    success: function(data){
                        var html = '<option value="">Select Roll NO</option>';
                        $.each(data,function(key,v){
                            html +='<option value="'+v.student.id_no+'">'+v.student.id_no+'</option>';
                        });
                        $('#id_no').html(html);
                    }
                });
            });
        });
    </script>

    <script>
        $(function () {
            $('#myForm').validate({
                rules: {
                    year_id: {
                        required: true,
                    },
                    class_id: {
                        required: true,
                    },
                    exam_type_id: {
                        required: true,
                    },
                    id_no: {
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
