<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema De Comunicacion FIS">
    <meta name="author" content="Nibbleframe.com">
    <meta name="keyword" content="Sistema de Comunicacion FIS">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="img/fis.ico">
    <title>FIS</title>
    <!-- Main styles for this application -->
    <link rel="stylesheet" href="css/plantilla.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <div id="app">
        <header class="app-header navbar">
            <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
            <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
            <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav navbar-nav d-md-down-none">
                <li class="nav-item px-3">
                    <a class="nav-link" href="#">Escritorio</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item d-md-down-none">
                    <a class="nav-link" href="#" data-toggle="dropdown">
                        <i class="icon-bell"></i>
                        <span class="badge badge-pill badge-danger">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-center">
                            <strong>Notificaciones</strong>
                        </div>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-envelope-o"></i> Ingresos
                            <span class="badge badge-success">3</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-tasks"></i> Ventas
                            <span class="badge badge-danger">2</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        <span class="d-md-down-none">{{Auth::user()->usuario}} </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-center">
                            <strong>Cuenta</strong>
                        </div>
                    
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Cerrar sesión</a>
                        <form action="{{route('logout') }}" method="POST" style="display:none;" id="logout-form">
                            {{csrf_field()}}

                        </form>
                    </div>
                </li>
            </ul>
        </header>

        <div class="app-body">
            @if(Auth::check())
                @if(Auth::user()->idrol ==1)
                    @include('plantilla.sidebaradministrador')
                @elseif (Auth::user()->idrol ==2)
                    @include('plantilla.sidebardocente')
                @else 

                @endif  
            @endif
            <!--contenido principal-->
            @yield('contenido')
            <!-- fin del contenido principal-->

        </div>
    </div>  
    

    <footer class="app-footer">
        <span><a href="http://www.nibbleframe.com/">NibbleFrame</a> &copy; 2018</span>
        <span class="ml-auto">Desarrollado por <a href="http://www.nibbleframe.com/">NibbleFrame</a></span>
    </footer>
    <!-- GenesisUI main scripts -->
    <script src="js/app.js"></script>
    <script src="js/plantilla.js"></script>
    
</body>

</html>