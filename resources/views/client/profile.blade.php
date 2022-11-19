<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url('https://img.freepik.com/premium-photo/hand-holds-user-person-icon-interface-blue-background-user-symbol-your-web-site-design-logo-app-ui-banner_150455-5212.jpg?w=1480');
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">LadyBird Web Solution</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/homes">Home</a></li>
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="{{route('auth.login')}}">Logout</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-5">
            @if (Session::has('msg'))
                <div class="alert alert-warning" role="alert">
                    {{Session::get('msg')}}
                </div>
            @endif
            <h3>User Profile</h3><br>
            <form method="post">
                @csrf
                <input type="hidden" name="id" value="{{$loguser->id}}">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control"  name="name" value="{{$loguser->name}}" >
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control"  name="email" value="{{$loguser->email}}">
                </div>
                <div class="form-group">
                    <label>Phonenumber:</label>
                    <input type="number" class="form-control"  name="phonenumber" value="{{$loguser->phonenumber}}">
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <input type="text" class="form-control"  name="address" value="{{$loguser->address}}">
                </div>
                <a href="/profileedit/{{$loguser->id}}" class="btn btn-primary" >Edit Profile</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
