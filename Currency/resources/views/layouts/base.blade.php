<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <title>@yield('title')</title>

        <link rel="preconnect" href="https://fonts.gstatic.com"> 
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('img/favicon.ico') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body>
        <header class="header">
            <h1 class="header__title">Currency Bot</h1>
            <div class="header__menu">
                <div class="header__menu--profile">
                    <img src={{asset('img/user-icon.png')}} alt="user_profile" />
                    @if(isset(auth()->user()->name))
                        <p>{{ auth()->user()->name }}</p>
                    @else
                        <p>Guest</p>
                    @endif
                </div>
                @if(isset(auth()->user()->name))
                    <ul>
                        <li><a href="{{ route('logout') }}">Sign off</a></li>
                    </ul>
                @endif
            </div>
        </header>

        <section class="main">
            <div class="main__content">
                <div class="main__content_initial-padding"></div>
                @yield('content')
            </div>
        </section>  
    </body>
    
</html>