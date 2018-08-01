<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="public/css/login.css" rel="stylesheet" type="text/css"/>
        <!-- Styles -->
        
    </head>
    <body>
        <div class="wrapper-page">
            <div class="flex-center position-ref full-height">
                <img src='public/plugins/assets/background/skye.jpg' />
                <div class="content">
                    <div class="links">
                        <a href="#">Login</a>
                        <a href="#">Register</a>
                    </div>
                    <div class="title m-b-md">
                        Miss Silliman
                    </div>
                    <form class="form-horizontal m-t-20" method="POST" action="{{url('/signin')}}">
                        {{ csrf_field() }}
                        <div class="form-group form-group-default">
                          <label>Username</label>
                          <div class="controls">
                            <input type="text" name="username" placeholder="username" class="form-control" required>
                          </div>
                        </div>                
                        <div class="form-group form-group-default">
                          <label>Password</label>
                          <div class="controls">
                            <input type="password" class="form-control" name="password" placeholder="password" required>
                          </div>
                        </div>
                        <div>
                          <button class="btn btn-primary btn-cons m-t-10" type="submit">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>