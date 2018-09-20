<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .white-text{
                color: white !important;
                font-family: 'Nanum Gothic', sans-serif !important;
            }
            .link{
                font-size:20px !important
            }
        </style>
        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Open+Sans+Condensed:300|Poor+Story" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    </head>
    <body style="background-image: url(http://notesandqueries.ca/wp-content/uploads/2014/12/Pataskala_Elementary_School.jpg);background-repeat: no-repeat;
    background-size: cover;
    background-position: center;">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <!--<a href="{{ url('/home') }}">Home</a>-->
                    @else
                        <!--<a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>-->
                    @endauth
                </div>
            @endif

            <div class="content">
                
                <div class="title m-b-md white-text">
                    School Management System
                </div>
                <p>School Portal</p>

                <div class="links white-text">
                    <a class="white-text link" href="{{route('admin.dashboard')}}"><i class="fa fa-lock"></i> Admin Panel</a>
                    <a class="white-text link" href="{{route('teacher.dashboard')}}"><i class="fa fa-chalkboard-teacher"></i> Teacher Panel</a>
                    <a class="white-text link" href="{{route('parent.dashboard')}}"><i class="fa fa-male"></i><i class="fa fa-female"></i> Parent Panel</a>
                </div>
            </div>
        </div>
    </body>
</html>
