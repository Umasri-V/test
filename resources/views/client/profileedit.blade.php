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
            background-image: url('https://img.freepik.com/free-vector/network-mesh-wire-digital-technology-background_1017-27428.jpg?w=1380&t=st=1668163330~exp=1668163930~hmac=0e5311f58c65bc24254199626d6fa1425faad28a5aecbd11c4048d84615541e4');
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
            <h3>Edit Profile</h3><br>
            <form method="post" action="{{route('profile.update')}}">
                @csrf
                <input type="hidden" name="id" value="{{$edit->id}}">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control"  name="name" value="{{$edit->name}}" >
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control"  name="email" value="{{$edit->email}}">
                </div>
                <div class="form-group">
                    <label>Phonenumber:</label>
                    <input type="number" class="form-control"  name="phonenumber" value="{{$edit->phonenumber}}">
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <input type="text" class="form-control"  name="address" value="{{$edit->address}}">
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
