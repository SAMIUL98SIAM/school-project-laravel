@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Student Group</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Student Group</li>
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
                       Add Group
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('setups.student.group.view')}}"><i class="fa fa-list"> Student Group List</i></a>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                           <form method="post" action="{{ route('setups.student.group.store') }}" id="myForm" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-5">
                                    <label class="name">Group Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="image">
                                    <font style="color:red;">
                                        {{($errors->has('name'))?($errors->first('name')):''}}
                                    </font>
                                </div>
                                <div class="col-2" style="padding-top: 30px;">
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


