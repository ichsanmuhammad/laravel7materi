<!doctype html>
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
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <ul class="navbar-nav mr-auto">
                    @guest
                        <li class="nav-item">
                            <a href="" class="nav-link">Menu1</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Menu2</a>
                        </li>
                    @endguest
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            @auth
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link">Tabel Bagian</a>
                            </li>
                            @can('create', App\Bagian::class)
                                <li class="nav-item">
                                    <a href="{{ url('/bagians/create') }}" class="nav-link">Tambah Bagian</a>
                                </li>
                            @endcan
                                <li class="nav-item">
                                    <a href="{{ url('/daftar-karyawan') }}" class="nav-link">Daftar Karyawan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/tabel-karyawan') }}" class="nav-link">Tabel Karyawan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/blog-karyawan') }}" class="nav-link">Blog Karyawan</a>
                                </li>
                            @endauth
                        </ul>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
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
</body>
</html>
