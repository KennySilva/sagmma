<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sagmma</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Deals</a></li>
                <li><a href="#">Stores</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                @if (Auth::guest())
                    <li><a href="{{ route('auth.register') }}"><i class="fa fa-user"></i>&nbsp;&nbsp;Registar</a></li>
                    <li><a href="{{ route('auth.login') }}"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Entrar</a></li>
                @else
                    <li><a href="/home">{{ Auth::user()->name }} - (Logado)</a></li>
                @endif

            </ul>
        </div>
    </div>
</nav>
