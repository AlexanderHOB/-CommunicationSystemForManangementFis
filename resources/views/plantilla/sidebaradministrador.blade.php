
<div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li @click="menu=0" class="nav-item">
                    <a class="nav-link active" href="main.html"><i class="icon-speedometer"></i> Escritorio</a>
                </li>
                <li class="nav-title">
                    GENERAL
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-user"></i> Cargos</a>
                    <ul class="nav-dropdown-items">
                        <li @click="menu=1"  class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-dice"></i> Crear Cargos</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fas fa-chalkboard-teacher"></i>Procesos</a>
                    <ul class="nav-dropdown-items">
                        <li @click="menu=2" class="nav-item">
                            <a class="nav-link" href="i#"><i class="fas fa-project-diagram"></i> Crear Procesos</a>
                        </li>
                        <li @click="menu=3" class="nav-item">
                            <a class="nav-link" href="i#"><i class="fas fa-file-signature"></i> Crear Codigo</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fas fa-file-pdf"></i>Documentos</a>
                    <ul class="nav-dropdown-items">
                        <li @click="menu=5" class="nav-item">
                            <a class="nav-link" href="main.html"><i class="fas fa-file-invoice"></i> Tipo - Documentos </a>
                        </li>
                        <li @click="menu=6" class="nav-item">
                            <a class="nav-link" href="main.html"><i class="fas fa-file-pdf"></i> Documentos </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fas fa-user-cog"></i>Administrables</a>
                    <ul class="nav-dropdown-items">
                        <li @click="menu=4" class="nav-item">
                            <a class="nav-link" href="main.html"><i class="fas fa-project-diagram"></i> Procesos a Cargo </a>
                        </li>
                       
                        <li @click="menu=14" class="nav-item">
                            <a class="nav-link" href="main.html"><i class="fas fa-file-pdf"></i> Documentos </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"> <i class="fas fa-share-alt-square"></i> Doc Compartidos </a>
                    <ul class="nav-dropdown-items">
                        <li @click="menu=7" class="nav-item">
                            <a class="nav-link" href="main.html"><i class="fas fa-file-invoice"></i> Tipo de Documentos </a>
                        </li>
                        <li  @click="menu=8" class="nav-item">
                            <a class="nav-link" href="main.html"><i class="fas fa-file-pdf"></i> Documentos </a>
                        </li>
                    </ul>
                </li>
                <li @click="menu=9" class="nav-item">
                            <a class="nav-link" href="main.html"><i class="fas fa-file-excel"></i> Doc interno <span class="badge badge-danger">Obsoleto</span></a>
                        </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Acceso</a>
                    <ul class="nav-dropdown-items">
                        <li @click="menu=10" class="nav-item">
                            <a class="nav-link" href="i#"><i class="icon-user"></i> Usuarios</a>
                        </li>
                        <li @click="menu=11" class="nav-item">
                            <a class="nav-link" href="#"><i class="icon-user-following"></i> Roles</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" @click="menu=12">
                    <a class="nav-link" href="main.html"><i class="icon-book-open"></i> Ayuda <span class="badge badge-danger">PDF</span></a>
                </li>
                <li class="nav-item" @click="menu=13">
                    <a class="nav-link" href="main.html"><i class="icon-info"></i> Acerca de...<span class="badge badge-info">IT</span></a>
                </li>
            </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>