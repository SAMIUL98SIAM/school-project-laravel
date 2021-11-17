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
                    <h3 class="card-title">Grade Point List</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('marks.grade.create')}}"><i class="fa fa-plus-circle"> Create Grade Point</i></a>

                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Grade Name</th>
                                <th>Grade Point</th>
                                <th>Start Marks</th>
                                <th>End Marks</th>
                                <th>Point Range</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key=>$data)
                            <tr class="{{$data->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$data->grade_name}}</td>
                                <td>{{number_format((float)$data->grade_point,2)}}</td>
                                <td>{{$data->start_marks}}</td>
                                <td>{{$data->end_marks}}</td>
                                <td>{{number_format((float)$data->start_point,2)}} - {{number_format((float)$data->end_point,2)}}</td>
                                <td>{{$data->remarks}}</td>
                                <td>
                                    <a title="Edit" class="btn btn-sm btn-primary" href="{{route('marks.grade.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

