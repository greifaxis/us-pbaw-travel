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
                @if (Auth::check() && (Auth::user()->role()->value('role')=='admin'))
                        @else
                    <li class="nav-item"><a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{route('contact.index')}}">Contact Us</a></li>
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
                                <a class="dropdown-item text-danger {{ Request::is('user') ? 'active' : '' }}" href="{{route('user.index')}}">Manage Users</a>
                                <a class="dropdown-item text-danger {{ Request::is('order') ? 'active' : '' }}" href="{{route('order.index')}}">Manage Orders</a>
                                <a class="dropdown-item text-danger {{ Request::is('contact/create') ? 'active' : '' }}" href="{{route('contact.create')}}">Message Inbox</a>
                                <div class="dropdown-divider"></div>
                            @else
                                <a class="dropdown-item {{ Request::is('basket') ? 'active' : '' }}" href="{{route('basket.index')}}">My Basket</a>
                                <a class="dropdown-item {{ Request::is('order') ? 'active' : '' }}" href="{{route('order.index')}}">My Orders</a>
                            @endif
                                <a class="dropdown-item {{Request::is('user*') ? 'active' : '' }}" href="{{route('user.show',Auth::id())}}">My Profile</a>

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

