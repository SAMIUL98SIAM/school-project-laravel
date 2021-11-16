@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Other Cost</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Other Cost</li>
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
                    <h3>Create Other Cost</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('accounts.cost.view')}}"><i class="fa fa-list"> Other Cost List</i></a>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                           <form method="post" action="{{ route('accounts.cost.store') }}" id="myForm" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-3">
                                    <label for="date">Date:</label>
                                    <input type="text" id="date" name="date" class="form-control form-control-sm singledatepicker" placeholder="Date" readonly>
                                </div>
                                <div class="col-3">
                                    <label for="amount">Amount:</label>
                                    <input type="text" id="amount" name="amount" class="form-control form-control-sm" placeholder="Amount">
                                </div>
                                <div class="col-2">
                                    <label class="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>
                                <div class="col-4" style="padding-top: 10px;">
                                    <img id="showImage" src="{{url('/upload/no_image.jpg')}}" alt="User profile picture" style="width:150px; height:160px; border:1px solid #000;">
                                    {{-- <img id="showImage" src="{{!empty($user->image)?url('/upload/user_image/'.$user->image):url('/upload/no_image.jpg')}}" height="150px" width="130px;" alt="Card image cap"/> --}}
                                </div>
                                <div class="col-12">
                                    <label class="description">Description:</label>
                                    <textarea name="description" class="form-control" id="description" rows="4"></textarea>
                                </div>
                                <div class="col-3" style="padding-top: 30px;">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
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
          amount: {
              required: true,
          },
          description: {
            required: true,
          },
          image: {
            required: true,
            minlength: 6
          },
          date: {
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
