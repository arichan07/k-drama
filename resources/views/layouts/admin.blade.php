<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light style="background-color: pink; navbar-expand-lg navbar-light bg-light rounded-bottom">
            <a class="navbar-brand" href="#">Top</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーションの切替">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="Navber">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home<span class="sr-only">(現位置)</span></a>
                        </li>
                    </ul>    
                    <form class="form-inline my-2 my-lg-0">
                        <form action="{{ action('Admin\KdramaController@index') }}" method="get">
                            <div class="form-group row">
                                <nav class="navbar navbar-light bg-light">
                                    <form class="form-inline">
                                        <input type="text" class="form-control" name="cond_title" placeholder="検索..." aria-label="検索..." value={{ $cond_title }}>
                                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">検索</button>
                                    </form>
                                </nav>
                                    {{ csrf_field() }}    
                        @guest
                            <ul><a class="nav-link ml-auto" href="{{ route('login') }}">{{ __('Login') }}</a></ul>
                        @else
                            <ul class="nav-item dropdown ml-auto">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </ul>
                        @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>