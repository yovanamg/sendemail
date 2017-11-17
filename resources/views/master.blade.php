<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="UTF-8">
  	<title>Seguros y Finanzas</title>
  	<!-- <link rel="stylesheet" href="{{asset("css/bootstrap.css")}}"> -->
    <script src="{{asset("js/jquery-3.2.1.js")}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  </head>
  <body>
  <style>
  .image-logo {
    max-height: 65px;
    padding: 7px;
  }

  .nav-bar-color {
    background: #7D3030;
  }
  </style>

  <nav>
    <div class="nav-wrapper row nav-bar-color">
      <div class="col s12 m12 l12">
        <div class="col s6 m6 l3">
          <a href="{{ url('/admin_login') }}">
            <img src="img/logo.png" class="image-logo">
          </a>
        </div>
        <div class="col s6 m6 l9">
          <ul id="nav-mobile" class="right">
            @if (Auth::guard('web_admin')->guest())
              <!-- <li><a href="{{ url('/admin_login') }}">Entrar</a></li> -->
              <li><a href="{{ url('/admin_register') }}">Registrarte</a></li>
            @else
              <li class="dropdown">
                <a 
                  href="#" 
                  class="dropdown-toggle" 
                  data-toggle="dropdown" 
                  role="button" 
                  aria-expanded="false">
                  {{ Auth::guard('web_admin')->user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a 
                      href="{{ url('/admin_logout') }}"
                      onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                      Cerrar sesión
                    </a>
                    <form 
                      id="logout-form" 
                      action="{{ url('/admin_logout') }}" 
                      method="POST" 
                      style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
            @endif
          </ul>
        </div>
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

  </body>
</html>
