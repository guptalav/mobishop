<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mobishop - @yield('title')</title>
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{ url('/') }}">
                        Mobishop
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/bundles') }}">Bundles</a></li>
                        <li class="cart"><a href="{{ url('/carts') }}">Cart ({{ Cart::count() }})</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <div class="push"></div>

    </div>

    <footer>
        <div class="container">
            <p class="text-muted">By <a href="http://lavgupta.me">Lav Gupta</a></p>
        </div>
    </footer>

    <script src="{{ elixir('js/app.js') }}"></script>
    @yield('extra-js')
</body>
</html>
