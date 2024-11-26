<section class="full-box nav-lateral">
    <div class="full-box nav-lateral-bg show-nav-lateral"></div>
    <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
            <i class="far fa-times-circle show-nav-lateral"></i>
            <img src="{{ asset('assets/avatar/Avatar.png') }}" class="img-fluid" alt="Avatar">
            <figcaption class="roboto-medium text-center">
                Carlos Alfaro <br><small class="roboto-condensed-light">Web Developer</small>
            </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
            <ul>
                <li><a href="{{ route('dashboard') }}"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Inicio</a></li>
                <li>
                    @role('Estudiante')
                        <a class="nav-btn-submenu"><i class="fas fa-user-tie fa-fw"></i> &nbsp; eventos y
                            anuncioss
                            <i class="fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="eventos-anuncios"><i class="fas fa-user-plus fa-fw"></i> &nbsp; Eventos</a>
                            </li>
                            <li><a href="anuncios"><i class="fas fa-users fa-fw"></i> &nbsp;
                                    Anuncios</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('Historial') }}"><i class="fas fa-columns fa-fw"></i> &nbsp;Historial</a>
                    </li>
                    <li><a href="{{ route('citas') }}"><i class="fas fa-columns fa-fw"></i> &nbsp; Citas</a>
                    <li><a href="#"><i class="fas fa-columns fa-fw"></i> &nbsp; Dan</a>
                    @endrole





                    @role('Coordinador BU|BU')
                        <a class="nav-btn-submenu"><i class="fas fa-user-tie fa-fw"></i> &nbsp; eventos y anuncios
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul>
                            <li><a href="creacion-evento"><i class="fas fa-user-plus fa-fw"></i> &nbsp; Eventos</a></li>
                            <li><a href="creacion-anuncio"><i class="fas fa-users fa-fw"></i> &nbsp; Anuncios</a></li>
                        </ul>
                    @endrole

                    @role('BU')
                    <li><a href="{{ route('historial') }}"><i class="fas fa-columns fa-fw"></i> &nbsp;Historial de
                            Atenciones</a></li>
                    <li><a href="{{ route('editarCita') }}"><i class="fas fa-columns fa-fw"></i> &nbsp; Citas</a></li>
                    <li><a href="Atenciones"><i class="fas fa-columns fa-fw"></i> &nbsp; Dan</a></li>
                @endrole

            </ul>


        </nav>
    </div>
</section>
