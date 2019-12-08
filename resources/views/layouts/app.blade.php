<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        #specs-list th {
            color: #d50000;
        }

        #accordionExample{
            width: 100%;
        }

        tr {
            border: grey solid 1px;
        }
        td {
            border: grey solid 1px;
        }
    </style>
    <!-- Styles -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div id="app">
                        <!-- Authentication Links -->
                        @if (Auth::guest())

                        <nav class="navbar navbar-light bg-light">
                            <a class="navbar-brand">
                                    <li><a href="{{ route('login') }}">Login</a></li>

                            </a>
                        </nav>

                        @else

                        <nav class="navbar navbar-light bg-light">
                            <a class="navbar-brand">
                                <h4>
                                    <strong>B</strong>onjour
                                    {{ Auth::user()->name }}
                                </h4>
                            </a>

                            {{-- barre de recherche téléphone --}}
                            <form action="{{ route('search') }}" method="post" class="form-inline">
                                    {{ csrf_field() }}
                                <input class="form-control mr-sm-2" type="text" name="searchdevice" placeholder="modèle Téléphone" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>

                            {{-- boutton de déconnexion --}}
                            <form class="form-inline" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Déconnexion</button>
                            </form>


                        </nav>
                            {{-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li> --}}
                        @endif

        @yield('content')
    </div>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
$('.collapse').collapse();
</script>
</body>
</html>
