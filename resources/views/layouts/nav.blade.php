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
                            <a class="nav-link {{ request()->is($page->slug) ? 'active' : '' }}" href="/{{ $page->slug }}">{{ $page->title }}</a>
                        </li>

                        
                        
                    @endforeach

                        @guest
                          
                            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
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
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>