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
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img class="col-md-8" src="http://planet12.com/p12v5/wp-content/uploads/2014/07/logo-boutique.png"
            style="width: 150px; height: 75px">
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <ul class="nav navbar-nav" style="margin-top: 19px;">
        <li class="dropdown">
          <a href="#" 
            class="dropdown-toggle" 
            data-toggle="dropdown" 
            role="button" 
            aria-expanded="false">
            Categorías 
            <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            @foreach($categories as $c)
              <li>
                <a href="{{url('')}}">{{$c->name}}</a>
              </li>
            @endforeach
          </ul>
        </li>
        <li class="dropdown">
          <a href="{{url('viewhot')}}" role="button" aria-expanded="false">
            Lo mas vendido
          </a>
        </li>
        <li class="dropdown">
          <a href="{{url('viewclient')}}" role="button" aria-expanded="false">
            Clientes
          </a>
        </li>
        <li class="dropdown">
          <a href="{{url('viewarticles')}}" role="button" aria-expanded="false">
            Articulos
          </a>
        </li>
         <li class="dropdown">
          <a href="{{url('viewcategory')}}" role="button" aria-expanded="false">
            Categorías - Articulos
          </a>
        </li>
        <li class="dropdown">
          <a href="{{url('viewinventary')}}" role="button" aria-expanded="false">
            Inventario
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
   <footer class="text-center">
    <hr>
    Yovana Mata 2017 &copy;
</body>
</html>