<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous"
        />
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('js/login.js') }}" />
  
    <title>LOGIN</title>
</head>
<body>
 <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"
        ></script>
    <div class="background"></div>
    @if (session('status'))
    <div class="alert alert-danger text-center">
        {{ session('massage') }}
    </div>
@endif
    <div class="content">
        <div class="form">
            <img src="{{ URL::asset('resources/img/logo2.png') }}" alt="">
            <div class="container">
                <form action="" method="post">
                        @csrf
                    <input placeholder="Username" type="text" name="username" class="username" required />
                    <label for="username"  style="display:none">Username Required</label>
                    <input placeholder="Password" type="password" class="password1" name="password" required/>
                    <label for="password"  style="display:none">Password Required</label>
                    <button id="login" class="btn" type="submit">Sign In</button>
                    <a  class="btn btn-outline-danger " href="/" style="margin-top: 200px"><p style="margin-top: 5px">Back</p></a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>