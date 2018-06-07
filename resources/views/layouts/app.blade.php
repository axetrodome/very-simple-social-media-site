<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="https://data.whicdn.com/images/247168735/superthumb.jpg?t=1467231658">
    <title>@yield('title') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- select 2 script --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" defer></script>


    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .media p
        {
            padding:5px 0 0 15px;
            font-size:13px;
        }

        .comment
        {
            font-size:12px;
        }
        /*.post
        {
            margin-bottom:36px;
        }
        .post p
        {
            padding:5px 0 0 15px;
            color: #696969;
        }
        .avatar{
            border-radius:5px;
        }
        .post--user-avatar
        {
            border-radius:100%;
        }
        .post--comment-container
        {
            padding:5px 0 0 15px;
        }
        .post--comment p
        {
            padding:5px 0 5px 55px;

        }*/
        
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li>
                            <form action="{{ route('search') }}" method="GET">
                                @csrf
                                <div class="input-group mb-3">
                                  <input type="text" name="query" class="form-control" placeholder="Search anyone.." aria-label="" aria-describedby="basic-addon1">
                                  <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                                  </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="/storage/images/avatars/{{ profile_exists(Auth::user()->image)  }}" alt="profile-picture" width="40" height="35" style="border-radius:100%">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.public',Auth::user()->slug) }}">
                                        My profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profile',Auth::user()->slug) }}">
                                        Update profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('settings',Auth::user()->slug) }}">
                                        {{ __('Settings') }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $(".js-example-basic-multiple").select2({
                placeholder: "Tags: rants, batang ina"
            });

        });
    </script>
</body>
</html>
