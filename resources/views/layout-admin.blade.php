<!doctype html>

<html lang=it>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titolo') | Andrea Vettori</title>

        <!-- Style -->

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
        <script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>
        <style>
            .list-group-item:hover {
                background: #b8daff;
            }
        </style>
    </head>
    <body>

     <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
            <a class="navbar-brand" href="/admin">Admin</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarsExample04" style="">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="/admin">Pagine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('new') ? 'active' : '' }}" href="/new">Nuova Pagina</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('logo') ? 'active' : '' }}" href="/logo">Logo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('sfondo') ? 'active' : '' }}" href="/sfondo">Sfondo</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">{{ Auth::user()->name }} <i class="fas fa-key"></i>
                        </a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {!! __('Logout <i class="fas fa-sign-out-alt"></i>') !!}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
       

    <div class="container">

            <h1 class="mt-5">@yield('titolo')</h1>
            <h3 class="mt-4">@yield('sottotitolo')</h3>

             @yield('content')
            
    </div>

    @include('layouts.footer') 

    </body>
</html>
