<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!-- Styles -->
        <style>
        html, body {
                background-color:#000033;
                color:white;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .content {
                text-align: center;
                vertical-align: middle;
                line-height: 450px;
            }
            .title {
                font-size: 84px;

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

        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height col-sm-12">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
                <!-- <div class="w3-bar w3-blue">
                    <a href="http://localhost/laravel/public/about" class="w3-bar-item w3-button">About</a>
                    <a href="http://localhost/mobliestore/public/brands" class="w3-bar-item w3-button">Brand</a>
                    <a href="http://localhost/mobliestore/public/lists" class="w3-bar-item w3-button">Product</a>
                    <a href="https://www.facebook.com/linncomputerstore/" class="w3-bar-item w3-button">Facebook</a>
                    <a href="http://www.linnonlinestore.com/" class="w3-bar-item w3-button">Online Shop Page</a>
                    <a href="https://urlzs.com/tkx97" class="w3-bar-item w3-button">Contact Us</a>
                </div> -->
                <div class="content">
                <div class="title m-b-md ">
                Linn Mobile Store
                </div>
            </div>

    </body>
</html>
