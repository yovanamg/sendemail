<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Seguros y finanzas</title>
    <!-- <link rel="stylesheet" href="{{asset("css/bootstrap.css")}}"> -->
    <script src="{{asset("js/jquery-3.2.1.js")}}"></script> <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
      .image-logo {
        max-height: 55px;
        padding: 7px;
      }
      .dropdown-right {
        text-align: right;
        position: static;
      }
      .p-0 {
        padding: 0 !important;
      }

      .nav-bar-color {
        background: #7D3030;
      }

      .color-hover a:hover {
        color: white;
      }

      .dropdown-menu {
        position: static;
      }
    </style>
</head>
<body>
  <div id="app">
    <nav>
      <div class="nav-wrapper row nav-bar-color">
        <div class="col s12 m12 l12 p-0">
          <div class="col s2 m2 l2 center-align">
            <a href="{{ url('/admin_login') }}">
              <img src="img/logo-1.png" class="image-logo">
            </a>
          </div>
          <div class="col s6 m6 l3">
            <div class="col s12 m12 l12 color-hover">
              <a href="{{ url('/user') }}">Usuarios</a>
            </div>
          </div>
          <div class="col s4 m4 l7 p-0">
          <ul id="nav-mobile" class="right color-hover">
            @if (Auth::guard('web_admin')->guest())
              <li><a href="{{ url('/admin_login') }}">Entrar</a></li>
              <li><a href="{{ url('/admin_register') }}">Registrarte</a></li>
            @else
            <li class="dropdown">
              <a 
                href="#" 
                class="dropdown-toggle dropdown-right" 
                data-toggle="dropdown" 
                role="button" 
                aria-expanded="false">
                {{ Auth::guard('web_admin')->user()->name }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{ url('/admin_logout') }}"
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
    @yield('content')
  </div>
  <script src="/js/app.js"></script>
</body>
</html>




