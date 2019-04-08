<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        {{--TODO SVG logo of UŚ Travel--}}
        {{--<a class="navbar-brand" href="#">@yield('title')</a>--}}
        <a class="navbar-brand" href="/">UŚ Tavel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('tours') ? 'active' : '' }}"
                                        href="tours">Tours</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('hotels') ? 'active' : '' }}" href="hotels">Hotels</a>
                </li>
                <li class="nav-item"><a class="nav-link text-danger {{ Request::is('myorders') ? 'active' : '' }}"
                                        href="myorders">My Orders</a></li>
                <li class="nav-item"><a class="nav-link text-danger {{ Request::is('myaccount') ? 'active' : '' }}"
                                        href="myaccount">My Account</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="about">Contact
                        Us</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('test') ? 'active' : '' }}" href="test">TEST</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{--Dynamic navbar--}}
{{--                @forelse(Config::get('navItemUsers') as $navItem)
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is(strtolower(preg_replace('/\s+/', '', $navItem))) ? 'active' : '' }}"
                           href="{{'/'.strtolower(preg_replace('/\s+/', '', $navItem))}}">{{$navItem}}</a>
                    </li>
                @empty
                    <p>Error loading fields!</p>
                @endforelse--}}