<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Boutique</title>
    <link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
    <script src="{{asset("js/jquery-3.2.1.js")}}"></script> <link href="/css/app.css" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-default navbar-static-top">
      <div style="margin-right: 10px">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img class="col-md-8" src="http://planet12.com/p12v5/wp-content/uploads/2014/07/logo-boutique.png"
            style="width: 150px; height: 80px; padding: 0">
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <ul class="nav navbar-nav" style="margin-top: 19px;">
        <li class="dropdown">
          <a href="#" 
            class="dropdown-toggle" 
            data-toggle="dropdown" 
            role="button" 
            aria-expanded="false" style="font-weight: 500; font-size: 16px;">
            Categorías 
            <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            @foreach($categories as $c)
              <li>
                <a href="{{url('viewartcat')}}/{{$c->id}}">{{$c->name}}</a>
              </li>
            @endforeach
          </ul>
        </li>
        <li class="dropdown">
          <a href="{{url('viewhot')}}" role="button" aria-expanded="false" style="font-weight: 500; font-size: 16px;">
            Lo mas vendido
          </a>
        </li>
        <li class="dropdown">
          <a href="#" role="button" aria-expanded="false" style="font-weight: 500; font-size: 16px;">
            Promociones
          </a>
        </li>
        <li class="dropdown">
          <a href="#" 
            class="dropdown-toggle" 
            data-toggle="dropdown" 
            role="button" 
            aria-expanded="false" style="font-weight: 500; font-size: 16px;">
            Configuraciones 
            <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="dropdown">
              <a href="{{url('viewarticles')}}" role="button" aria-expanded="false">
                Articulos
              </a>
            </li>
            <li class="dropdown">
              <a href="{{url('viewcategories')}}" role="button" aria-expanded="false">
                Categorías - Articulos
              </a>
            </li>
            <li class="dropdown">
              <a href="{{url('viewclient')}}" role="button" aria-expanded="false">
                Clientes
              </a>
            </li>
            <li class="dropdown">
              <a href="{{url('viewinventory')}}" role="button" aria-expanded="false">
                Inventario
              </a>
            </li>
          </ul>
        </li>
          </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 10px">
              @if (Auth::guard('web_admin')->guest())
                <li><a href="{{ url('/admin_login') }}">Entrar</a></li>
                <li><a href="{{ url('/admin_register') }}">Registrarte</a></li>
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
    @yield('content')
  </div>
  <script src="/js/app.js"></script>
  <footer class="text-center" style="height: 250px; background: #9d8686;">
   <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-4" style="padding: 20px 100px">
          <p class="text-left"><img src="http://www.freeiconspng.com/uploads/facebook-f-logo-transparent-facebook-f-22.png" style="width: 20px; height: 20px">&nbsp;&nbsp;Facebook</p>
          <p class="text-left"><img src="http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c521.png" style="width: 20px; height: 20px">&nbsp;&nbsp;Instagram</p>
          <p class="text-left"><img src="http://www.freeiconspng.com/uploads/gmail-icon-5.png" style="width: 20px; height: 20px">&nbsp;&nbsp;Email</p>
          <p class="text-left"><img src="http://cougarcourier.com/wp-content/uploads/2015/12/bucsnfl-snapcode.png" style="width: 20px; height: 20px">&nbsp;&nbsp;Snap</p>
          <p class="text-left"><img src="http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c53e.png" style="width: 20px; height: 20px">&nbsp;&nbsp;Twitter</p>
        </div>
        <div class="col-md-4 text-center" style="color: #ffffff; padding-top: 60px">
           Yovana Mata 2017 &copy;
        </div>
        <div class="col-md-4">
          <h3 class="text-center" style="color: #ffffff; margin-top: 0">Boutique Design</h3>
          <p style="margin-bottom: 0">Contacto:</p>
          <label>Correo:</label> <p style="margin-bottom: 0">boutique.design@gmail.com</p>
          <label>Telefono:</label> <p style="margin-bottom: 0">6677673939</p>
          <label>Dirección:</label> <p style="margin-bottom: 0">Calle Miguel Hidalgo #714 Fracc. Villa del Real C.P. 80247</p>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>




