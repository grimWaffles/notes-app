<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm" id="nav-main">
    <div class="container">
        
        <!--Navbar brand-->
        @if (!Auth::User())
            <a class="navbar-brand" id="nav-brand-nav" href="{{ url('/') }}" style="font-family: 'Londrina Solid', cursive;
            letter-spacing: 4px; font-size:25px">
                Evernote
            </a>
            @else
                <a class="navbar-brand" id="nav-brand-nav" href="{{ url('/home') }}" style="font-family: 'Londrina Solid', cursive;
                letter-spacing: 4px; font-size:25px">
                    Evernote
                </a>
        @endif

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                
                <li class="nav-item">
                    <a class="nav-link" href="/notes">Home</a>
                </li>

                @if (Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="/notes/create">Create a new note</a>
                    </li>
                @endif
                
            </ul>
        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto" id="right-side-nav">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>