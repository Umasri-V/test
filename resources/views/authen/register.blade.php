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
            <a class="navbar-brand" href="#">LWS</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/homes">Home</a></li>
        </ul>
    </div>
</nav>
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
        <h3>Register Form</h3><br>
        <form method="post" action="{{route('con.make')}}">
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
                <label>Phonenumber:</label>
                <input type="number" class="form-control"  placeholder="Enter phonenumber" name="phonenumber">
                <span class="text-danger" >@error('phonenumber') {{$message}} @enderror </span>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control"  placeholder="Enter password" name="password">
                <span class="text-danger" >@error('password') {{$message}} @enderror </span>
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input type="text" class="form-control"  placeholder="Enter address" name="address">
                <span class="text-danger" >@error('address') {{$message}} @enderror </span>
            </div>
            <button type="submit" class="btn btn-success">Register</button><br><br>
            <a href="{{route('auth.login')}}">Already Registered !! Login here...</a>
        </form>
    </div>
    <div class="col-sm-4"><br><br>
        <img src="https://images.pexels.com/photos/1376412/pexels-photo-1376412.jpeg?auto=compress&cs=tinysrgb&w=340&h=1200&dpr=2">
    </div>
</div>

</body>
</html>
