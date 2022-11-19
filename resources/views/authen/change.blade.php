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

<div class="container-fluid">
    <div class="col-md-6 offset-3 pt-4">
        <h3 class="text-center">Change Password</h3>
        <form class="form" method="post" >
            @csrf
            <div class="mb-3">
                <label for="oldPasswordInput" class="form-label">Old Password</label>
                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                       placeholder="Old Password">
                @error('old_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="newPasswordInput" class="form-label">New Password</label>
                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                       placeholder="New Password">
                @error('new_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                       placeholder="Confirm New Password">
            </div><br>

            <button type="submit" class="btn btn-primary text-center">Submit</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
