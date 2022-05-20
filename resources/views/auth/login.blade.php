<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .container .row {
         height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center row ">
            <div class="col-lg-6">
                <form action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}
                    <div >
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" id="email" name="email" 
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" id="password" name="password"
                                    class="form-control"> 
                            </div>
                        </div>
                    </div>
                    <div >
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-block btn-success">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>