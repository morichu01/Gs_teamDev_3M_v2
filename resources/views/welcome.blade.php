<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>スケジュール</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        html,
        body {
            /* background-color: #fff; */
            background-image: url("../img/IMG_6095.png");
            background-size: cover;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
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

        .title>p {
            font-family: 'Comic Sans MS';
            opacity: 0.8;
            font-size: 70px;
            border-radius: 0.5em;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}" class="text-light bg-dark">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-light bg-dark">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-light bg-dark">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                <p class="p-3 mb-2 bg-secondary text-white">Welcome to G's Academy Farm</p>
            </div>

            <div class="links">
                
                <a href="#" class="text-light bg-dark">Map</a>
                <a href="#" class="text-light bg-dark">Contact</a>

            </div>
        </div>
    </div>
    <footer class="col text-center text-light bg-dark">2020 G's Academy FUKUOKA corporation</footer>
</body>

</html>
