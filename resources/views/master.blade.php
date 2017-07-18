<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="UTF-8">
  	<title>Yaya's</title>
  	<link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
    <script src="{{asset("js/jquery-3.2.1.js")}}"></script>
  </head>
  <body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <img class="col-md-8" src="http://planet12.com/p12v5/wp-content/uploads/2014/07/logo-boutique.png"
        style="width: 150px; height: 75px">
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav" style="margin-top: 19px;">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Catálogos <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{url('/')}}">Blusas</a></li>
              <li><a href="{{url('/')}}">Vestidos</a></li>
              <li><a href="{{url('/')}}">Pantalones</a></li>
              <li><a href="{{url('/')}}">Faldas</a></li>
              <li><a href="{{url('/')}}">Bolsas</a></li>
              <li><a href="{{url('/')}}">Tenis</a></li>
              <li><a href="{{url('/')}}">Zapatillas</a></li>
              <li><a href="{{url('/')}}">Accesorios</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" role="button" aria-expanded="false">
              Lo mas vendido
            </a>
          </li>
          <li class="dropdown">
            <a href="#" role="button" aria-expanded="false">
              Promociones
            </a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guard('web_admin')->guest())
            <li><a href="{{ url('/admin_login') }}" style="margin-top: 19px";>Entrar</a></li>
            <li><a href="{{ url('/admin_register') }}"  style="margin-top: 19px;">Registrarte</a></li>
          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::guard('web_admin')->user()->name }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{ url('/admin_logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Cerrar sesión
                  </a>
                  <form id="logout-form" action="{{ url('/admin_logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        @yield('contenido')
      </div>
    </div>
  </div>

  <footer class="text-center">
  	<hr>
  	Yovana Mata &copy; 2017
  </footer>
  <script src="{{asset("js/bootstrap.js")}}"></script>
  </body>
</html>
