@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Student Fee's</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Student Fee's</li>
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
                       Add Student Fee's
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('accounts.fee.view')}}"><i class="fa fa-list"> Student Fee's List</i></a>
                </div><!-- /.card-header -->

                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-3">
                                    <label class="year_id">Year</label>
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
                                    <label class="fee_category_id">Fee Category</label>
                                    <select name="fee_category_id" id="fee_category_id" class="form-control form-control-sm">
                                        <option value="">Select class</option>
                                        @foreach($fee_categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="date">Date:</label>
                                    <input type="text" id="date" name="date" class="form-control form-control-sm singledatepicker" placeholder="DD-MM-YYYY" autocomplete="off">
                                </div>
                                <div class="col-2" style="padding-top: 30px;">
                                    <a  id="search" name="search" class="btn btn-primary btn-sm">Search</a>
                                </div>
                            </div>
                        <!-- /.card-body -->
                        </div>
                   </div><!-- /.card-body -->
                </div>

                <div class="card-body">
                    <div id="DocumentResults"></div>
                    <script id="document-template" type="text/x-handlebars-template">
                        <form action="{{ route('accounts.fee.store') }}" method="post">
                            @csrf
                            <table class="table-sm table-bordered table-striped" style="width: 100%;">
                                <thead>
                                    <tr>
                                        @{{{thsource}}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @{{#each this}}
                                    <tr>
                                        @{{{tdsource}}}
                                    </tr>
                                    @{{/each}}
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 10px">Submit</button>
                        </form>
                    </script>
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
        $(document).on('click','#search',function () {
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            var fee_category_id = $('#fee_category_id').val();
            var date = $('#date').val();
            $('.notifyjs-corner').html('');
            if(year_id == '')
            {
                $.notify("Year required",{globalPosition:'top right',className:'error'});
                return false;
            }
            if(class_id == '')
            {
                $.notify("Class required",{globalPosition:'top right',className:'error'});
                return false;
            }
            if(fee_category_id == '')
            {
                $.notify("Fee Category required",{globalPosition:'top right',className:'error'});
                return false;
            }
            if(date == '')
            {
                $.notify("Date required",{globalPosition:'top right',className:'error'});
                return false;
            }
            $.ajax({
                url: "{{route('get-student-account-fee')}}",
                type: "get",
                data: {'year_id':year_id,'class_id':class_id,'fee_category_id':fee_category_id,'date':date},
                beforeSend: function(){
                },
                success: function(data){
                    var source = $("#document-template").html();
                    var template = Handlebars.compile(source);
                    var html = template(data);
                    $('#DocumentResults').html(html);
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });
        });
    </script>




<script>
    $(function () {
      $('#myForm').validate({
        rules: {
          name: {
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
