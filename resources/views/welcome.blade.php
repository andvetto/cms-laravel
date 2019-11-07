
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home | Andrea Vettori</title>

        <!-- Style -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>

    </head>
<body>
    
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">

                @if (isset($logo->file))
                    <a class="navbar-brand" href="{{ url('/') }}"><img class="rounded" src="{{ URL::to('/') }}/images/{{ $logo->file }}" width="50px" height="50px" alt=""></a>
                @endif
                
                <a class="navbar-brand" href="{{ url('/') }}">
                    Home
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @foreach ($pages as $page)
                            <li class="nav-item">
                                <a class="nav-link" href="/{{ $page->slug }}">{{ $page->title }}</a>
                            </li>
                        
                        @endforeach

                        @guest
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{!! __('Login <i class="fas fa-sign-in-alt"></i>') !!}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{!! __('Register <i class="fas fa-user-plus"></i>') !!}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item">
                                <a href="/admin" class="nav-link">{{ Auth::user()->name }} <i class="fas fa-key"></i>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

         @if (isset($sfondo->file))
            <style>
                #header {
            
                    background-image: url({{ URL::to('/') }}/images/{{ $sfondo->file }});
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                }

            </style>
        @endif

         @if (isset($sfondo->title))
            <div id="header" style="height: 50vh; color:white;" class="container-fluid text-center">

                    <h1 style="line-height: 25vh;">{{ $sfondo->title }}</h1>
                    <h3 class="mt-4">{{ $sfondo->subtitle }}</h3>  
                    
            </div>
        @endif

        <div class="container mt-5 mb-5">

            @foreach ($pages as $key => $page)

                

                <div class="container mt-5 mb-5">
                    <div class="row">

                    @if($key % 2 == 1)
                        <div class="col-12 mb-3">
                            <h3>{{ $page->title }}</h3>
                         </div>
                        <div class="col-lg-6 text-center order-lg-2" style="display: flex; align-items: center;">

                            <img src="{{ URL::to('/') }}/images/{{ $page->image }}" class="img-fluid rounded mt-3 mb-3" style="max-height: 400px; " alt="" />
                    
                        </div>



                        <div class="col-lg-6 text-justify mt-3">

                            {!! $page->text !!}

                            <a href="/{{ $page->slug }}"><button type="button" title="{{ $page->title }}" class="btn btn-block btn-lg btn-outline-dark">Vai a {{ $page->title }}</button></a> 
                        </div>

                    @endif

                    @if($key % 2 != 1)
                        <div class="col-12 mb-3">
                            <h3>{{ $page->title }}</h3>
                         </div>
                        <div class="col-lg-6 text-center" style="display: flex; align-items: center;">

                            <img src="{{ URL::to('/') }}/images/{{ $page->image }}" class="img-fluid rounded mt-3 mb-3" style="max-height: 400px;" alt="" />
                    
                        </div>
                        <div class="col-lg-6 text-justify mt-3">
                        

                            {!! $page->text !!}
                        

                            <a href="/{{ $page->slug }}"><button type="button" title="{{ $page->title }}" class="btn btn-block btn-lg btn-outline-dark">Vai a {{ $page->title }}</button></a> 
                        </div>
                    
                    @endif

                    </div>
                </div>



            @endforeach



        </div>

    <script>
        function TruncateText(maxLenght){
            $('p').each(function(){
                if($(this).html().length > maxLenght)
                    $(this).html($(this).html().substr(0,maxLenght-3)+'...');
            });
        }

        $(document).ready(TruncateText(500));
    </script>
   

    @include('layouts.footer') 
</body>
</html>
