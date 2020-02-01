<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Dashmix - Bootstrap 4 Admin Template &amp; UI Framework</title>

        @include('frontend.partials._head')

        
    </head>
    <body>
        
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">
            
               
            @include('frontend.partials._sidebar')
            <!-- END Sidebar -->

            <!-- Header -->
            @include('frontend.partials._header')
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                <!-- Hero -->
                @yield('content')
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            @include('frontend.partials._footer')
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <
        -->
        @include('frontend.partials._scripts')
        @yield('js')
    </body>
</html>
