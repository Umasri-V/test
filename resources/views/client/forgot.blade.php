<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap</title>
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
        </ul>
    </div>
</nav>
<div class="container"><br>
    <div class="col-sm-9">
    <h4>Change Password</h4><br>
        <form method="post" action="{{route('forgot')}}">
            @csrf
    <div class="col-sm-7">
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control"  placeholder="Enter email" name="email" value="{{old('email')}}">
            <span class="text-danger" >@error('email') {{$message}} @enderror</span>
        </div>
        <button type="submit" class="btn btn-primary">Send Reset Link</button>
        <br><br>
        <a href="/logins">Login here</a>
    </div>
    <div class="col-sm-5">
        <img src="https://www.findshop.co/assets/img/forgot-password.png" alt="img">
    </div>
        </form>
    </div>
</div>
</body>
</html>
