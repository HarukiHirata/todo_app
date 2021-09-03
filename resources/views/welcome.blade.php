<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
        .top-title {
            margin-top: 15vh;
            margin-bottom: 5vh;
        }
        body {
            text-align: center;
        }
        .top-link {
            color: white;
            cursor: pointer;
        }
        .top-link:hover {
            color: white;
        }
        </style>
    </head>
    <body class="antialiased">
        <div class="top-title">
            <h1 class="text-center">Todo_application</h1>
        </div>
        @if (Route::has('login'))
            @auth
                <button type="button" class="btn btn-info col-md-6 col-sm-10 my-5">
                    <a href="{{ url('/home') }}" class="top-link">ホーム</a>
                </button>
            @else
                <button type="button" class="btn btn-info col-md-6 col-sm-10 my-5">
                    <a href="{{ route('register') }}" class="top-link">新規登録</a>
                </button>
                <button type="button" class="btn btn-info col-md-6 col-sm-10">
                    <a href="{{ route('login') }}" class="top-link">ログイン</a>
                </button>
            @endauth
        @endif
    </body>
</html>
