@extends('layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Single User </h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Phonenumber</th>
                <th>Reason</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$get->id}}</td>
                <td>{{$get->firstname}}</td>
                <td>{{$get->lastname}}</td>
                <td>{{$get->email}}</td>
                <td>{{$get->phonenumber}}</td>
                <td>{{$get->reason}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection


@section('scripts')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>

@endsection
