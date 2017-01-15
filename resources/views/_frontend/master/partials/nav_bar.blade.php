{{-- <nav class="navbar navbar-default" data-spy="affix" data-offset-top="197"> --}}
<nav class="main-nav navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#myPage">SAGMMA</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#market_info">MMSC</a></li>
                {{-- <li><a href="#history">HISTORIA</a></li> --}}


                

                <li><a href="#values">VALORES</a></li>
                <li><a href="#gallery">GALERIA</a></li>


                <li><a href="#market_team">EQUIPA</a></li>
                <li><a href="#pricing">QUERO VENDER</a></li>
                <li><a href="#contact">CONTATAR</a></li>
                {{-- <li class="v_bar">|</li> --}}

                    @if (Auth::check())
                        {{-- <div class="hidden-xs"> --}}
                        <li class="dropdown">
                            <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><img src="/uploads/avatars/{!! Auth::user()->avatar !!}" class="user-image" alt="Placeholder"  style="width: 15px; height: 15px;"> <span class="" style="text-transform: uppercase;">{{ Auth::user()->name }} </span><span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                <li><a href="#">SAGMMA</a></li>
                                <li><a href="#">PERFIL</a></li>
                                <li><a href="#">MEU SITIO</a></li>
                            </ul>
                        </li>
                    {{-- </div> --}}
                    @endif



                {{-- @if (Auth::check())
                <li><a href="{{ url('/home') }}"><img src="/uploads/avatars/{!! Auth::user()->avatar !!}" class="user-image" alt="Placeholder"  style="width: 15px; height: 15px;"> {{ Auth::user()->name }}</a></li> --}}
                {{-- @else
                <li><a href=""><sup>ENTRAR</sup></a></li>
                <li><a href=""><sup>REGISTAR</sup></a></li>
                {{--
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i  class="fa fa-sign-in"></i><span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="{{ route('auth.login') }}">Login</a></li>
                <li><a href="{{ route('auth.register') }}">Registar</a></li>
            </ul>
        </li> --}}
        {{-- @endif --}}

    </ul>
</div>
</div>
</nav>
