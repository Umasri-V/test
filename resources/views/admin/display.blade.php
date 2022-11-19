
@extends('layouts.app')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Admin Panel</h1>
                        <button type="submit" class="btn btn-dark" style="margin-left: 185%"><a href="/log">logout</a></button>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="container">
            @if (Session::has('msg'))
                <div class="alert alert-warning" role="alert">
                    {{Session::get('msg')}}
                </div>
            @endif
            <a href="/admincontact" class="btn btn-outline-primary">Add New</a>
            <div class="col-sm-12">
                <table class="table table-bordered table-hover"><br>
                    <thead class="table-warning">
                    <tr>
                        <th>Id</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Reason</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($posts as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->firstname}}</td>
                                <td>{{$data->lastname}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->phonenumber}}</td>
                                <td>{{$data->reason}}</td>
                            <td>  <div class="dropdown">
                                    <button class="btn btn-outline-warning dropdown-toggle" type="button" data-toggle="dropdown">SELECT
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="single/{{$data->id}}" class="btn btn-xs btn-secondary">VIEW</a></li>
                                        <li> <a href="edit/{{$data->id}}" class="btn btn-xs btn-info">EDIT</a></li>
                                        <li>
                                            <form class="delete" action="{{ route('delete', $data->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="GET">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <span>
                {{$posts->links()}}
            </span>
            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script>
        $(".delete").on("submit", function(){
            return confirm("Do you want to delete this id?");
        });
    </script>
@endsection
