<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="description" content="Responsive Admin Template" />
        <title>Mini Car Inventory System</title>
        <!-- google font -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
        <!-- icons -->
        <link href="{{asset('plugins/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!-- bootstrap -->

        <link href="{{asset('plugins/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- style -->
        <link rel="stylesheet" href="{{asset('plugins/css/login.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <style type="text/css">
            body {
                overflow:hidden;
            }
        </style>
        <!-- favicon -->
        <link rel="shortcut icon" href="{{asset('plugins/img/favicon.ico')}}" /> 
    </head>
    <body>
        <div class="form-title">
            <h3 style= "font-weight:bold;font-size:36px">Mini Car Inventory System</h3>
        </div>
       
        <!-- Login Form-->
        <div class="login-form text-center">
            <div class="toggle">
                <i class="fa fa-sign-in"></i>
            </div>
            <div class="form ">
                <h2>Login to your account</h2>
                <form action="{{route('login')}}" id='login_form' method="POST">
                    {{ csrf_field() }}
                    <input type="email" name="email" id="email" placeholder="Email ID" autofocus>
                    <input type="password" name="password" id="password" placeholder="Password" />
                    <div class="remember text-left">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox2" type="checkbox" checked>
                            <label for="checkbox2">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <button type="submit" name="login" >Login</button>
                </form>
            </div>
        </div>
        @if (count($errors) > 0)
        <div class="col-md-12">
            <div class="col-md-6 alert alert-danger text-left col-md-offset-3">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        <!-- start js include path -->
        <script src="{{asset('plugins/assets/jquery.min.js')}}" ></script>
        <!--<script src="{{asset('plugins/assets/login.js')}}"></script>-->
        <script src="{{asset('plugins/assets/pages.js')}}" ></script>
        <!-- end js include path -->
    </body>

</html>