<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
              background-image: url("https://images.unsplash.com/photo-1499591934245-40b55745b905?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=872&q=80");
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-size: 100% 100%;
              background-color: rgba(5, 98, 127, 0.9);

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
                text-align: left;
            }
            .title {
                font-size: 100px;
                text-transform: uppercase;
                letter-spacing: .1rem;
            }

            .links > a {
                color: #000000;
                padding: 0 25px;
                font-size: 20PX;
                font-weight:10000;
                /* letter-spacing: .1rem; */
                text-decoration: none;
                text-transform: uppercase;
                box-shadow: inset 0 0 0 0 #54b3d6;
                transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
            }
            a:hover {
                    box-shadow: inset 800px 0 0 0 #54b3d6;
                    color: white;
                    }
            .m-b-md {
                margin-bottom: 30px;
            }


        </style>
   \
    </head>
    <body>
        <div class="flex-center position-ref full-height">


            <div class="content">
                <div class="title m-b-md">
                 <b style="color:#000000">Travel X<b>
                </div>

                <div class="links">
                                @if (Route::has('login'))
                                @auth
                    <a href="{{ url('/home') }}"">Home</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                              @else

                    <a href="{{ route('login') }}">login as Admin</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">register As Admin</a>

                    <a href="{{ route('hotels.login') }}">login as hotel</a>
                    <a href="{{ route('hotels.register') }}">register as hotel</a>
                    <a href="https://github.com/laravel/laravel">Contact Us</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
