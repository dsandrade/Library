<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Library Labs | @yield('page-title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{ Html::style('css/bootstrap.css') }}
    {{ Html::style('css/morris.css') }}
    {{ Html::style('css/sb-admin.css') }}
    {{ Html::style('font-awesome/css/font-awesome.css') }}

</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-fw fa-book"></i> Labs Library</a>
        </div>

        <ul class="nav navbar-right top-nav">
            @if (Auth::guest())
                <li><a href="{{ route('login') }}"><i class="fa fa-fw fa-sign-in"></i> Painel Administrativo</a></li>
            @else
                <li class="dropdown">
                    <a href="{{ url('/') }}"><i class="fa fa-fw fa-sign-in"></i> {{ Auth::user()->name }} </a>
                </li>
            @endif
        </ul>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                @if (Auth::user())
                    <li>
                        <a href={{ route('clientes.index') }}><i class="fa fa-fw fa-users"></i> Usuarios</a>
                    </li>
                    <li>
                        <a href={{ route('autores.index') }}><i class="fa fa-fw fa-user"></i> Autores</a>
                    </li>
                    <li>
                        <a href={{ route('editoras.index') }}><i class="fa fa-fw fa-building"></i> Editoras</a>
                    </li>
                    <li>
                        <a href={{ route('livros.index') }}><i class="fa fa-fw fa-book"></i> Livros</a>
                    </li>
                    <li>
                        <a href={{ route('livrosautores.index') }}><i class="fa fa-fw fa-bookmark"></i> Livros/Autores</a>
                    </li>
                    <li>
                        <a href={{ route('leitores.index') }}><i class="fa fa-fw fa-user-md"></i> Leitores</a>
                    </li>
                    <li>
                        <a href={{ route('emprestimos.index') }}><i class="fa fa-fw fa-calendar"></i> Emprestimos</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-fw fa-sign-out"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <div style="min-height: 100vh;" id="page-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
