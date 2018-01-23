<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titel')</title>

    <!-- Styles -->
    <link href="{{URL('/css/app.css')}}" rel="stylesheet">
    <link href="{{URL('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL('/css/bootstrap-rtl.css')}}" rel="stylesheet">
    <link href="{{URL('/css/me.css')}}" rel="stylesheet">


</head>
<body>
    <div id="app" class="container-fluid">

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">

                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">

                        <image src="{{url('image/logo.PNG')}}"></image> {{-- config('app.name', 'Laravel') --}}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav">

                    </ul>



                    <!-- Left Side Of Navbar -->

                    <ul class="nav navbar-nav navbar-left">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">ورود</a></li>
                            <li><a href="{{ url('/register') }}">ثبت نام / ارسال آگهی </a></li>
                        @else
                            <li>
                            <button  onclick={window.location.assign("{{url('/new')}}")} href="/new" class="New__button">
                                <span style="color:white; margin: 0 0 0 0 ; " class="glyphicon glyphicon-plus" ></span>
                                ارسال آگهی
                            </button></li>
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                                <ul class="dropdown-menu" role="menu" >
                                    <li class="li-head">
                                        <img src="{{url('image/user.png')}}" class="user-image">
                                        <p class="user-name">{{Auth::user()->name}}</p>
                                    </li>
                                    <li class="li-user"><a href="/user">پنل کاربری </a></li>
                                    <li class="li-user">
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> خروج   
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
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

        <div class="row">
            @yield('content')
        </div>

    </div>


    <!-- Scripts -->
    <script src="{{url('js/app.js')}}"></script>
    <script src="{{url('js/me.js')}}"></script>
    <script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#cat1").change(function(){
                $("#form").attr("action", "search/" + $("#cat1").val() );});
        });
    </script>
</body>
</html>
