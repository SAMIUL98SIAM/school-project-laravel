@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Employee Salary</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Employee Salary</li>
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
                       Add Employee Salary
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('accounts.salary.view')}}"><i class="fa fa-list"> Employee Salary List</i></a>
                </div><!-- /.card-header -->

                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <label for="date">Date:</label>
                                    <input type="text" id="date" name="date" class="form-control form-control-sm singledatepicker" placeholder="Date" readonly>
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
                        <form action="{{ route('accounts.salary.store') }}" method="post">
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
            var date = $('#date').val();
            $('.notifyjs-corner').html('');
            if(date == '')
            {
                $.notify("Date required",{globalPosition:'top right',className:'error'});
                return false;
            }
            $.ajax({
                url: "{{route('get-employee-account-salary')}}",
                type: "get",
                data: {'date':date},
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
