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
                    <a href="#" class="nav-btn-submenu"><i class="fas fa-user-tie fa-fw"></i> &nbsp; eventos y
                        anuncioss
                        <i class="fas fa-chevron-down"></i></a>
                    <ul>
                        <li><a href="#"><i class="fas fa-user-plus fa-fw"></i> &nbsp; Eventos</a>
                        </li>
                        <li><a href="#"><i class="fas fa-users fa-fw"></i> &nbsp;
                                Anuncios</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="nav-btn-submenu"><i class="fas fa-box-open fa-fw"></i> &nbsp; Products <i
                            class="fas fa-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ url('/product/new') }}"><i class="fas fa-box fa-fw"></i> &nbsp; New product</a>
                        </li>
                        <li><a href="{{ url('/product/list') }}"><i class="fas fa-boxes fa-fw"></i> &nbsp; List
                                products</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/base') }}"><i class="fas fa-columns fa-fw"></i> &nbsp; Base template</a></li>
            </ul>
        </nav>
    </div>
</section>
