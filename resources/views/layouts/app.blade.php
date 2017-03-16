<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pet Shop') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <style >
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    .row.content {height:auto;}













    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" rel="home" href="#" title="Buy Sell Rent Everyting">
                      <img style="max-width:80px; margin-top: -7px;"
                      src="https://s-media-cache-ak0.pinimg.com/originals/e6/f2/4a/e6f24ab3cab8c9d91e791c8a7f763d23.png">
                    </a>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Pet Shop') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                    <!--<li class="active"><a href="layout/imagem">Home</a></li>-->

                    <li><a href="homec">Área do Cliente</a></li>

                    <li><a href="homea">Área Administrativa</a></li>
                  </ul>



                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><a href="{{ url('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
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
          <div class="row-container">
            <div class="=col-sm-2">
            </div>
            <div class="col-sm-12 text-left">

              <div class="content">
                @if(Session::has('error'))
                  <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif

                @if(Session::has('info'))
                  <div class="alert alert-info">{{Session::get('info')}}</div>
                @endif

                @if(Session::has('warning'))
                  <div class="alert alert-warning">{{Session::get('warning')}}</div>
                @endif
              </div>

              @yield('conteudo')
              <br>
              <br>
              <br>

            </div>
          </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>


    <footer class="container-fluid text-center">
      <p>Pet Shop</p>
    </footer>


</body>
</html>
