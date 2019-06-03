<section class="hero is-light is-fullheight-with-navbar">
    <div class="hero-head">

        @include('partials._navbar')

    </div>

    <div class="hero-body">
        <div class="container">
            @include('partials._messages')

            {{-- {{ Auth::check() ? "Logged In" : "Logged Out" }} --}}

            @yield('content')
        </div>
    </div>

    <footer class="hero-foot">
        <div class="container">

            @include('partials._footer')

        </div>
    </footer>
</section>
