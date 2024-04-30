<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">dc.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                        href="{{ route('fs.post.index') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                        href="{{ route('fs.post.index', ['ctg' => 'original']) }}">Original</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                        href="{{ route('fs.post.index', ['ctg' => 'social']) }}">Social</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                        href="{{ route('fs.about.index') }}">About</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                        href="{{ route('fs.newsletter.index') }}">Newsletter</a></li>
                @if (Auth::check() && Auth::user()->role->name != 'admin')
                    <li class="nav-item dropdown px-lg-2 py-3 py-lg-3">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('fs.panel.profile.index') }}">My Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('fs.panel.stats.index') }}">My Stats</a></li>
                            <li><a class="dropdown-item" href="#">My Post</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('fs.logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @else
                    @if (request()->routeIs('fs.login.index'))
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="{{ route('fs.register.index') }}">Register</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="{{ route('fs.login.index') }}">Login</a></li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>
