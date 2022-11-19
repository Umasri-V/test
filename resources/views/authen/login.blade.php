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
    <div class="col-sm-6">
        <img src="https://cdn.autoproctor.co/static/img/icons/signin-desktop.svg">
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
        <h3>Login Form</h3><br>
        <form method="post" action="{{route('con.check')}}">
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
          <!--  <div class="form-group">
                <select class="select">
                    <option value="1" disabled>Select</option>
                    <option value="2">Client</option>
                    <option value="3">Admin</option>
                </select>

            </div><br>-->

            <button type="submit" class="btn btn-success">Login</button><br><br>
        </form>
        <a href="{{route('auth.register')}}">Register here!!</a><br><br>
        <a href="/forgot">Forgot Password</a>
    </div>
</div>
</body>
</html>
