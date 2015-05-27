<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">


        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    @if (Request::path() == 'auth/register')
    <body class="body-register">

    @elseif (Request::path() == 'auth/login')
    <body class="body-login">
    
    @else
    <body>
        @endif
        
        <header>
            <nav class="navbar navbar-default back">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="pull-left" href="{{ url('/') }}"><img src="{{ asset('img/logo-jungler2.png') }}" /></a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())


                            <li><a href="{{ url('/auth/register') }}" class="ahref">Register</a></li>
                            <li><a href="{{ url('/auth/login') }}" class="ahref">Login</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle ahref" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">

                                    <!--<li><a href="#">Log In</a></li>-->



                                    <form class="navbar-form navbar-center" role="login"  method="POST" action="{{ url('/auth/login') }}">
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <li>Usuario</li>
                                            <li>   <input type="text" class="form-control" placeholder="jungler@jungler.es" name="email" value="{{ old('email') }}"></li>
                                            <li>Contrase&ntilde;a</li>
                                            <li> <input type="password" class="form-control" placeholder="******" name="password"></li>
                                        </div>
                                      
                                        <li><input type="submit" class="btn btn-success bt" value="Login" /></li>
                                    </form>

                                </ul>

                            </li>
                            @else
                            <li>

                                <a href="{{ url('/auth/top') }}" class="ahref"><span class= "glyphicon glyphicon-star-empty" aria-hidden="true">Top</span> </a>


                            </li>
                            <li>

                                <a href="{{ url('/auth/miArbol') }} " class="ahref">    <span class= "glyphicon glyphicon-tree-conifer" aria-hidden="true">MiArbol </span></a>

                            </li>
                            <li>  <img class="img-circle" src="{{ asset('img/dede.jpg') }}" width="45" height="45"></li>
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle ahref afocus" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/users/'.Auth::user()->slug) }}"> <span class="glyphicon glyphicon-user" aria-hidden="true"> Perfil</span></a></li>
                                    <li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-off" aria-hidden="true"> Salir</span></a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>


                    </div>
                </div>
            </nav>
        </header>
        @if (Session::has('message'))
        <div class="flash alert-info">
            <p>{{ Session::get('message') }}</p>
        </div>
        @endif

        @yield('content')

        <!-- Scripts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
