@extends('layouts.app')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-5">
                    <div class="col-sm-6">
                        <h1 class="m-0">Login Form</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>



    <div class="col-sm-6">
        @if (Session::has('msg'))
            <div class="alert alert-warning" role="alert">
                {{Session::get('msg')}}
            </div>
        @endif

        @if (Session::has('fail'))
            <div class="alert alert-warning" role="alert">
                {{Session::get('fail')}}
            </div>
        @endif
        <form method="post" action="{{route('log.check')}}">
            @csrf
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control"  placeholder="Enter email" name="email" value="{{old('email')}}">
                <span class="text-danger" >@error('email') {{$message}} @enderror </span>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control"  placeholder="Enter password" name="password">
                <span class="text-danger" >@error('password') {{$message}} @enderror </span>
            </div><br>
            <button type="submit" class="btn btn-success">Login</button><br><br>
        </form>
        <a href="/regadmin">Register here!!</a><br><br>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>

@endsection

