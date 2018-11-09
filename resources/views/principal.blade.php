<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema De Comunicacion FIS">
    <meta name="author" content="NibbleFrame.com">
    <meta name="keyword" content="Sistema de Comunicacion FIS">
    <link rel="shortcut icon" href="img/fis.ico">
    <title>FIS</title>
    <!-- Main styles for this application -->
    
    <link href="/css/plantilla.css" rel="stylesheet">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
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
                    <span class="d-md-down-none">admin </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Perfil</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Cerrar sesión</a>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="main.html"><i class="icon-speedometer"></i> Escritorio</a>
                    </li>
                    <li class="nav-title">
                        GENERAL
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-user"></i> Cargos</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-dice"></i> Crear Cargos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="fas fa-chalkboard-teacher"></i>Procesos</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="i#"><i class="fas fa-project-diagram"></i> Crear Procesos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="i#"><i class="fas fa-file-signature"></i> Crear Codigo</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="fas fa-user-cog"></i>Administrables</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                        		<a class="nav-link" href="main.html"><i class="fas fa-project-diagram"></i> Procesos a Cargo </a>
                    		</li>
		                    <li class="nav-item">
		                        <a class="nav-link" href="main.html"><i class="fas fa-file-invoice"></i> Tipo de Documentos </a>
		                    </li>
		                    <li class="nav-item">
		                        <a class="nav-link" href="main.html"><i class="fas fa-file-pdf"></i> Documentos </a>
		                    </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i <i class="fas fa-share-alt-square"></i> Doc Compartidos </a>
                        <ul class="nav-dropdown-items">
                	 		<li class="nav-item">
		                        <a class="nav-link" href="main.html"><i class="fas fa-file-invoice"></i> Tipo de Documentos </a>
		                    </li>
		                    <li class="nav-item">
		                        <a class="nav-link" href="main.html"><i class="fas fa-file-pdf"></i> Documentos </a>
		                    </li>
                        </ul>
                    </li>
                    <li class="nav-item">
		                        <a class="nav-link" href="main.html"><i class="fas fa-file-excel"></i> Doc interno <span class="badge badge-danger">Obsoleto</span></a>
		                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Acceso</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="i#"><i class="icon-user"></i> Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-user-following"></i> Roles</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="main.html"><i class="icon-book-open"></i> Ayuda <span class="badge badge-danger">PDF</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="main.html"><i class="icon-info"></i> Acerca de...<span class="badge badge-info">IT</span></a>
                    </li>
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>
        <!--contenido principal-->
        @yield('contenido')
        <!-- fin del contenido principal-->

    </div>

    

    <footer class="app-footer">
        <span><a href="http://www.nibbleframe.com/">NibbleFrame</a> &copy; 2018</span>
        <span class="ml-auto">Desarrollado por <a href="http://www.nibbleframe.com/">NibbleFrame</a></span>
    </footer>
    <!-- GenesisUI main scripts -->
    <script src="js/plantilla.js"></script>
</body>

</html>