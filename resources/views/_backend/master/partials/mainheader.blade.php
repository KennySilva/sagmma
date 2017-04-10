<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <span class="logo-mini"><b>SAG</b></span>
        <span class="logo-lg"><b>SAGMMA</b>dmin</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegação</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::check())
                            <img src="/uploads/avatars/{!! Auth::user()->avatar !!}"  class="user-image" alt="Placeholder">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            @if(Auth::check())
                                <img src="/uploads/avatars/{!! Auth::user()->avatar !!}"  class="img-circle" alt="Placeholder">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Membro do SAGMMA desde à {{ Auth::user()->created_at->diffForHumans() }}</small>
                                </p>
                            @endif
                        </li>
                        <li class="user-footer text-center">
                            <div class="btn-group btn-group-justified">
                                <a href="{{ url('user/profiles') }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> Perfil</a>
                                <a href="/" class="btn btn-success"><i class="fa fa-home" aria-hidden="true"></i> Sítio</a>
                                <a href="{{ url('/auth/logout') }}" class="btn btn-success"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>

                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    @role(['super-admin'])
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    @endrole
                </li>
            </ul>
        </div>
    </nav>
</header>
