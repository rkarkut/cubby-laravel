<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cubby - all your links in one place...</title>

        <!-- Bootstrap -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/cubby.css" rel="stylesheet">

        <script src="/js/jquery-2.1.1.min.js"></script>
        <script src="/js/rails.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/cubby.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    @section('navbar')
        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/">Cubby</a>
            </div>
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav">
                    <li>{{ link_to_route('pages.waiting_list', 'Waiting list') }}</li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <span class="caret"></span></a>
                        
                        <ul class="dropdown-menu" role="menu">
                        @foreach($_categories as $category)
                            <li class="presentation">
                                <a href="{{ URL::route('categories.show', array('id' => $category->id)) }}">
                                    {{ $category->name }}
                                    <span class="badge" style="text-align: right">{{ $category->links->count() }}</span>
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <div class="btn-group">

                        @if (Auth::check() == false)
                        
                            {{ link_to_route('home.login', 'Login', array(), array('class' => 'btn btn-primary btn-sm')) }}
                            {{ link_to_route('home.register', 'Register', array(), array('class' => 'btn btn-primary btn-sm')) }}
                            
                        @else

                            <div class="dropdown">
                                <a class="dropdown-toggle logout-dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                {{ Auth::user()->email }}
                                <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li role="presentation">
                                        {{ link_to_route('home.logout', 'Logout', array(), array('role' => 'menuitem', 'tabindex'=>'-1')) }}
                                    </li>
                                </ul>
                            </div>

                        @endif

                        </div>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
    @show


    <div class="container">
        
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
        @endif

        @if($errors->any())
            @foreach ($errors->all() as $message)
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @endforeach
        @endif
        
        @yield('content')
    </div>

    <div class="footer">
        <div class="container">
            <p class="text-muted">Copyright &copy; 2014 by <a href="http://rkarkut.pl">rkarkut.pl</a></p>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    </body>
</html>