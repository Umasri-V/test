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

        <div class="container"><br>
    <div class="col-sm-5">
        @if (Session::has('msg'))
            <div class="alert alert-success" role="alert">
                {{Session::get('msg')}}
            </div>
        @endif
        <h3>Contact Form</h3><br>
        <form method="post" action="{{route('send.email')}}">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" class="form-control"  placeholder="Enter first name" name="firstname" value="{{old('firstname')}}" >
                        <span class="text-danger" >@error('firstname') {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" class="form-control"  placeholder="Enter last name" name="lastname" value="{{old('lastname')}}" >
                        <span class="text-danger" >@error('lastname') {{$message}} @enderror</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control"  placeholder="Enter email" name="email" value="{{old('email')}}">
                <span class="text-danger" >@error('email') {{$message}} @enderror </span>
            </div>
            <div class="form-group">
                <label>Phone Number:</label>
                <input type="number" class="form-control"  placeholder="Enter phonenumber" name="phonenumber" value="{{old('phonenumber')}}">
                <span class="text-danger" >@error('phonenumber') {{$message}} @enderror </span>
            </div>
            <div class="form-group">
                <label>Reason for Contact :</label>
                <input type="text" class="form-control"  placeholder="Enter reason" name="reason" value="{{old('reason')}}" >
                <span class="text-danger" >@error('reason') {{$message}} @enderror</span>
            </div>
            <button type="submit" class="btn btn-success">Submit</button><br><br>
        </form>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
@endsection
