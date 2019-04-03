<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        {{--TODO SVG logo of UŚ Travel--}}
        <a class="navbar-brand" href="#">@yield('title')</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                @forelse($navItems as $navItem)
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{'/'.strtolower(preg_replace('/\s+/', '', $navItem))}}">{{$navItem}}</a>
                    </li>
                @empty
                    <p>Error loading fields!</p>
                @endforelse
            </ul>
        </div>
    </div>
</nav>