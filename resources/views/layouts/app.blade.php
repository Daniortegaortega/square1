<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('title')
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/alerta.js') }}"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{ asset('js/app.js') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    </head>
    <body class="loading">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ url('/') }}">Square1</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="{{ url('/') }}">Welcome</a></li>
            </ul>
          <ul class="nav navbar-nav navbar-right">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name}} {{Auth::user()->lastname}} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                   <a href="{{ url('wishlist') }}"><span class="glyphicon glyphicon-list-alt"></span>  WishList</a>
                                </li>
                                <li>
                                    <a  href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                 <span class="glyphicon glyphicon-log-out"></span>
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <a href="{{ route('login') }}" data-toggle="modal" data-target="#modalLogin"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                        <a href="{{ route('register') }}" data-toggle="modal" data-target="#modalRegistro"><span class="glyphicon glyphicon-user"></span> Register</a>
                    @endauth
                </div>
            </ul>
          </div>
        </nav>
            @endif
        <!--modal LOGIN Y REGISTER-->
        <div class="modal fade" id="modalLogin" role="dialog" aria-labelledby="favoritesModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" >
                    
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalRegistro" role="dialog" aria-labelledby="favoritesModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" >
                    
                </div>
            </div>
        </div>

    @yield('content')
</body>
</html>

