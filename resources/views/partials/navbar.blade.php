<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
            <i class="far fa-compass fa-lg mr-2"></i>{{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link {{ Request::is('tours') ? 'active' : '' }}" href="{{route('tours.index')}}">Tours</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('hotels') ? 'active' : '' }}" href="{{route('hotels.index')}}">Hotels</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('database') ? 'active' : '' }}" href="/database">Database</a></li>

                {{--@if (Auth::check() ? (Auth::user()->role()->value('role')=='admin') : false)--}}
                @if (Auth::check() && (Auth::user()->role()->value('role')=='admin'))
                        @else
                    <li class="nav-item"><a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="contact">Contact Us</a></li>
                @endif
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
                    <li class="nav-item nav-link text-muted">{{ Auth::user()->role()->value('description') }}</li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}<span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->role()->value('role')=='admin')
                                {{--@if (Auth::check() ? (Auth::user()->role()->value('role')=='admin') : false)--}}
                                <a class="dropdown-item text-danger {{ Request::is('showusers') ? 'active' : '' }}" href="manageusers">Manage Users</a>
                                <a class="dropdown-item text-danger {{ Request::is('showorders') ? 'active' : '' }}" href="manageorders">Manage Orders</a>
                                <a class="dropdown-item text-danger {{ Request::is('showorders') ? 'active' : '' }}" href="manageorders">Message Inbox</a>
                            @else
{{--                                <a class="dropdown-item {{Request::is('myprofile') ? 'active' : '' }}" href="#">My Basket</a>--}}
                                <a class="dropdown-item {{Request::is('myprofile') ? 'active' : '' }}" href="{{route('user.index')}}">My Profile</a>
                                {{--<div class="dropdown-divider"></div>--}}
                                <a class="dropdown-item {{ Request::is('myorders') ? 'active' : '' }}" href="{{route('order.show',Auth::id())}}">My Orders</a>
                            @endif

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
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
