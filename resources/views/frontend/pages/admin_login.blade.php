<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('login_register/css/style.css') }}">
    <!-- TITLE -->
    <title>Login Form</title>
</head>
<body>

    <div class="login-main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="login-form">

                        <h3>Login account</h3>
                        @session('error')
                            <div class="alert alert-success">
                                {{ session('error') }}
                            </div>

                        @endsession
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{ route('login_store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" >
                                <label class="form-label">Email</label>
                            </div>
                            <div class="form-group mt-4">
                                <input type="password" class="form-control" name="password" >
                                <label class="form-label">Password</label>
                            </div>
                            <div class="remember-forgot">
                                <label><input type="checkbox">Remember Me</label>
                                 <a href="#">Forgot Password</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-theme col-12">Login</button>
                            </div>
                            <div class="register-link">
                                <p>Dont have an account? <a href="{{ route('admin_signup') }}">Register</a></p>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
