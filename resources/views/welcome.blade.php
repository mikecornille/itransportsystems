<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ITS Maker</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Style --> 

        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

        <style>

        body {
            background-image: 
        }

        </style>


    </head>
    <body>

   <!--  <form action="{{ URL::to('sendmail') }}" method="post">
    {{ csrf_field() }}
        <input type="email" name="mail">
        <input type="text" name="title">
        <button type="submit">Send mail</button>
    </form> -->



        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    ITS Maker
                </div>

                
            </div>
            <div id="dialog" title="Dialog Title">
        </div>
        <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    </body>
</html>
