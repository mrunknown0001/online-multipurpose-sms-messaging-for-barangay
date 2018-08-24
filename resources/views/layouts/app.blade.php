<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> Messaging </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{  asset('modular/css/vendor.css') }}">
        <link rel="stylesheet" href="{{ asset('modular/css/app-blue.css') }}">
        <link rel="stylesheet" href="{{ asset('css/toggle-button.css') }}">
        <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"> -->

    </head>
    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                @yield('headside')
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content dashboard-page">
                    <section class="section">
                        <div class="row">
                            <div class="col-md-12">
                                @yield('content')
                            </div>
                        </div>
                    </section>
                 </article>
                @include('includes.footer')
            </div>
        </div>
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="{{ asset('modular/js/vendor.js') }}"></script>
        <script src="{{ asset('modular/js/app.js') }}"></script>
    </body>
</html>