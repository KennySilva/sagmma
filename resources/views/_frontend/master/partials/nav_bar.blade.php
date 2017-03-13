    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="sagmma" class="navbar-brand" href="#myPage">SAGMMA</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">

                    <li><a id="mmsc" href="#market_info">MMSC</a></li>
                    <li><a id="valores" href="#values">VALORES</a></li>
                    <li><a id="galeria" href="#gallery">GALERIA</a></li>
                    <li><a id="equipa" href="#market_team">EQUIPA</a></li>
                    <li><a id="contactar" href="#contact">CONTACTAR</a></li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">COMERCIANTES</i><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('auth.login') }}">INFORMAÇÕES</a></li>
                            <li><a href="#pricing">PROMOÇÕES</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/article') }}" onclick="myFunction()">NOTÍCIA</a></li>
                    @if (Auth::check())
                        <li class="dropdown">
                            <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><img src="/uploads/avatars/{!! Auth::user()->avatar !!}" class="user-image" alt="Placeholder"  style="width: 15px; height: 15px;"> <span class="" style="text-transform: uppercase;">{{ Auth::user()->name }} </span><span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                @role(['admin', 'backend'])
                                @permission(['admin', 'acess-backend'])
                                <li><a href="{{ url('/home') }}"><i class="fa fa-unlock"></i> SAGMMA</a></li>
                                @endpermission
                                @endrole
                                @role(['trader'])
                                <li><a href="#"><i class="fa fa-sticky-note"></i> MEU NEGÓCIO</a></li>
                                @endrole
                                <li><a href="#"><i class="fa fa-user-o"></i> PERFIL</a></li>
                                <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i> SAIR</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i  class="fa fa-sign-in"></i><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('auth.login') }}"><i class="fa fa-sign-in"></i> LOGIN</a></li>
                                <li><a href="{{ route('auth.register') }}"><i class="fa fa-user-plus"></i> REGISTAR</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
