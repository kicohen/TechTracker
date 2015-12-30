<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">
</head>

<body>

<div class="container">

    @if ($errors->has())
        <div class="alert alert-danger" style="margin-top:15px;">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <form action="{{ route('sessions.store')  }}" method="POST" class="form-signin">
        <h2 class="form-signin-heading text-center">Login</h2>
        <input type="email" name="email" class="form-control" placeholder="Email address" />
        <input type="password" name="password" class="form-control" placeholder="Password" />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->

</body>
</html>
