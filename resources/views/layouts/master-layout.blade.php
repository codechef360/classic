@include('partials._header')
    <body>
        @include('partials._header-menu')
        @include('partials._top-bar')
        @yield('breadcrumb')
        @yield('main-content')

        @include('partials._footer')
        @include('partials._footer-scripts')
    </body>
</html>
