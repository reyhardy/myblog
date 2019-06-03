
<nav class="navbar is-fixed-top has-background-primary" role="navigation" aria-label="navigation">
    <div class="container is-flex-mobile">
        <div class="navbar-brand">
          <p class="navbar-item">
              My Blog
          </p>
        </div>

        @if($agent->isMobile())

            {{-- <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Overview</a>
                <div class="navbar-dropdown">
                    <a class="navbar-item">About</a>
                    <a class="navbar-item">Contact</a>
                </div>
            </div> --}}

        @endif

        <div class="navbar-menu">
            <div class="navbar-start">
                <a href="/" class="navbar-item {{ Request::is('/') ? "is-active" : ""}}">
                  Home
                </a>
                <a href="/about" class="navbar-item  {{ Request::is('about') ? "is-active" : ""}}">
                  About
                </a>
                <a href="/contact" class="navbar-item  {{ Request::is('contact') ? "is-active" : ""}}">
                  Contact
                </a>
            </div>

            <div class="navbar-end">

                @if (Auth::check())
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ route('posts.index') }}">
                                        Post
                                </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @else
                    <div class="navbar-item">
                        <p>Hello, Guest</p>
                    </div>

                @endif

            </div>
        </div>
    </div>
</nav>
