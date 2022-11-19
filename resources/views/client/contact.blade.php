<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">LadyBird Web Solution</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/homes">Home</a></li>
            <li><a href="/vieww">Contact Details</a> </li>
        </ul>
    </div>
</nav>
<div class="container"><br>
    <div class="col-sm-5">
        @if (Session::has('msg'))
            <div class="alert alert-success" role="alert">
                {{Session::get('msg')}}
            </div>
        @endif
        <h3>Contact Form</h3><br>
        <form method="post" action="{{route('send.emailclient')}}">
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
    <div class="col-sm-1">

    </div>
    <div style="margin-top: 60px" class="col-sm-4">
        <img src="https://uwaterloo.ca/central-stores/sites/ca.central-stores/files/styles/body-500px-wide/public/uploads/images/little_man_holding_red_envelope.jpg">
    </div>
</div>
</body>
</html>
