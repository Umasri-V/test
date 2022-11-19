<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body{

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
            <li><a href="{{route('profile')}}">Profile</a></li>
            <li><a href="/clientcontact">Contact Us</a> </li>
            <li><a href="{{route('auth.login')}}">Logout</a></li>
        </ul>
    </div>
</nav>
</body>
</html>

