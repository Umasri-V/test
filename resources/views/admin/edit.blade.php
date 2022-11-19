@extends('layouts.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-5">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Form</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container">
            <div class="col-sm-5">
                <form method="post" action="{{route('form.update')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$edit->id}}">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" class="form-control"  placeholder="Enter first name" name="firstname" value="{{$edit->firstname}}" >
                    </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" class="form-control"  placeholder="Enter last name" name="lastname" value="{{$edit->lastname}}" >
                </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control"  placeholder="Enter email" name="email" value="{{$edit->email}}">
        </div>
        <div class="form-group">
            <label>Phone Number:</label>
            <input type="number" class="form-control"  placeholder="Enter phonenumber" name="phonenumber" value="{{$edit->phonenumber}}">
        </div>
        <div class="form-group">
            <label>Reason for Contact :</label>
            <input type="text" class="form-control"  placeholder="Enter reason" name="reason" value="{{$edit->reason}}" >
        </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>

@endsection
