
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
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fas fa-user-cog"></i>Administrables</a>
                    <ul class="nav-dropdown-items">
                        <li @click="menu=4" class="nav-item">
                            <a class="nav-link" href="main.html"><i class="fas fa-project-diagram"></i> Procesos a Cargo </a>
                        </li>
                       
                        <li @click="menu=6" class="nav-item">
                            <a class="nav-link" href="main.html"><i class="fas fa-file-pdf"></i> Documentos </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"> <i class="fas fa-share-alt-square"></i> Doc Compartidos </a>
                    <ul class="nav-dropdown-items">
                        <li  @click="menu=8" class="nav-item">
                            <a class="nav-link" href="main.html"><i class="fas fa-file-pdf"></i> Documentos </a>
                        </li>
                    </ul>
                </li>
                {{-- <li @click="menu=9" class="nav-item">
                            <a class="nav-link" href="main.html"><i class="fas fa-file-excel"></i> Doc interno <span class="badge badge-danger">Obsoleto</span></a>
                </li> --}}
                
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