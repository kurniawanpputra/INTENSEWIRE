<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{App\Setting::first()->site_name}} – {{$title}}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('img/main.png')}}">

    @yield('styles')
    
    <style>
        body{
            background: rgb(255,0,0);
            background: linear-gradient(90deg, rgba(128,0,0,1) 5%, rgba(0,0,0,1) 75%);
        }
        @font-face{
            font-family: 'Metal Maiden';
            src: url('/fonts/Metal Lord.ttf');
        }
        .brand{
            font-family: 'Metal Maiden';
        }
        @keyframes menu{
            0% {margin-left: 0px;}
            50% {margin-left: 5px;}
            100% {margin-left: 0px;}
        }
        .side-link{
            color: black;
        }
        .side-link:hover, .side-link:focus{
            animation: menu .5s ease-in-out infinite;
            text-decoration: none;
            font-weight: bold;
            color: maroon;
        }
        #intense{
            color: black;
        }
        #intense:hover, #intese:focus{
            cursor: pointer;
        }
        #wire{
            color: maroon;
        }
        p.navbar-brand.brand{
            padding: 14px 15px;
            font-size: 28px;
        }
        table tr:nth-child(even){
            background-color: #f1f1f1;
        }
        .profile{
            margin-bottom: 10px;
            border-radius: 75px;
            max-width: 150px;
            height: auto;
            width: 100%;
        }
        #profile{
            margin-bottom: 15px;
            border-radius: 75px;
            max-width: 150px;
            height: auto;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <p class="navbar-brand brand" style="margin-bottom: 0;">
                        <span id="intense" onclick="start()" class="data">INTENSE</span><span id="wire">WIRE</span>
                    </p>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('profile.edit') }}">Edit Profile</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                @if(Auth::check())
                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('home') }}" class="side-link">Dashboard</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{ route('user.create') }}" class="side-link">Create user</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('users') }}" class="side-link">View users</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tag.create') }}" class="side-link">Create tag</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tags') }}" class="side-link">View tags</a>
                            </li>
                            @endif
                            <li class="list-group-item">
                                <a href="{{ route('post.create') }}" class="side-link">Create post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('posts') }}" class="side-link">View posts</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{ route('category.create') }}" class="side-link">Create category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('categories') }}" class="side-link">View categories</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('settings') }}" class="side-link">Settings</a>
                            </li>
                            @endif
                            <li class="list-group-item">
                                <a href="{{ route('trashed.posts') }}" class="side-link">Trash bin</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-8">
                        @yield('content')
                    </div>
                @else
                    <div class="col-lg-8 col-lg-offset-2">
                        @yield('content')
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/baffle.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    <script>
        @if(session('success'))
            toastr.success("{{ session('success') }}")
        @endif
        @if(session('info'))
            toastr.info("{{ session('info') }}")
        @endif
        @if(session('error'))
            toastr.error("{{ session('error') }}")
        @endif
    </script>

    <script>
        const observer = lozad();
        observer.observe();
    </script>

    <script type="text/javascript">
		const text = baffle(".data");
		text.set({
            characters: '2y108HP8VhyMhTAVqyqNkKACeX8sZnlt11hRXpnENHaLGK5Ya4gDonuq',
			speed: 125
		});

		function start() {
			text.start();
			text.reveal(2500, 1000);
		}
	</script>

    @yield('scripts')
</body>
</html>
