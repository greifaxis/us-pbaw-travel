{{--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        --}}{{--TODO SVG logo of UŚ Travel--}}{{--
        --}}{{--<a class="navbar-brand" href="#">@yield('title')</a>--}}{{--
        <a class="navbar-brand" href="/">UŚ Tavel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('tours') ? 'active' : '' }}" href="tours">Tours</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('hotels') ? 'active' : '' }}" href="hotels">Hotels</a></li>
                <li class="nav-item"><a class="nav-link text-danger {{ Request::is('myorders') ? 'active' : '' }}" href="myorders">My Orders</a></li>
                <li class="nav-item"><a class="nav-link text-danger {{ Request::is('myaccount') ? 'active' : '' }}" href="myaccount">My Account</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="about">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('test') ? 'active' : '' }}" href="test">TEST</a></li>
            </ul>
        </div>
    </div>
</nav>--}}

<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('tours') ? 'active' : '' }}"
                                        href="tours">Tours</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('hotels') ? 'active' : '' }}" href="hotels">Hotels</a>
                </li>
                <li class="nav-item"><a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="about">Contact
                        Us</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('test') ? 'active' : '' }}" href="test">TEST</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item"><a class="nav-link">{{ Auth::user()->role_id }}</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}<span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item text-danger {{ Request::is('myprofile') ? 'active' : '' }}"
                               href="myprofile">My Profile</a>
                            <a class="dropdown-item text-danger {{ Request::is('myorders') ? 'active' : '' }}"
                               href="myorders">My Orders</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{csrf_field()}}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
