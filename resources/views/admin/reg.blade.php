@extends('layouts.app')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-5">
                    <div class="col-sm-6">
                        <h1 class="m-0">Register Form</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>



<div class="container"><br>
    <div class="col-sm-5">
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
        <form method="post" action="{{route('admin.save')}}">
            @csrf
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control"  placeholder="Enter name" name="name" value="{{old('name')}}" >
                <span class="text-danger" >@error('name') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control"  placeholder="Enter email" name="email" value="{{old('email')}}">
                <span class="text-danger" >@error('email') {{$message}} @enderror </span>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control"  placeholder="Enter password" name="password">
                <span class="text-danger" >@error('password') {{$message}} @enderror </span>
            </div>
            <button type="submit" class="btn btn-success">Register</button><br><br>
            <a href="/logadmin">Already Registered !! Login here...</a>
        </form>
    </div>
</div>
    </div>

@endsection

        @section('scripts')
            <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>

@endsection

