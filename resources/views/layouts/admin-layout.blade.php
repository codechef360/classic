@include('admin.partials._header')
<body>
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>

    @include('admin.partials._top-fixed-bar')
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('admin.partials._sidebar-menu')
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    @yield('main-content')
                </div>
            </div>
            @include('admin.partials._footer-note')
        </div>
    </div>
 @include('admin.partials._footer-scripts')
