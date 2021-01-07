<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>@yield('title')</title>
        <link rel="icon" href="{{ asset('img/favicon.ico') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>

    <body>

        <header class="header">
            <h1 class="header__title">Currency Bot</h1>
            <div class="header__menu">
                <div class="header__menu--profile">
                    <img src={{asset('img/user-icon.png')}} alt="user_profile" />
                    <p>You don't sing up</p>
                </div>
                <ul>
                    <li><a href="{{ route('logout') }}">Sign off</a></li>
                </ul>
            </div>
        </header>

        <section class="main">
            <div class="main__content">
                @yield('content')
            </div>
        </section>  

        @yield('script')
    </body>
    
</html>