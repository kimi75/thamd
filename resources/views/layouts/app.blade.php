<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">

    <head>
        @yield('head')
        @include('layouts.head')
        @vite(['resources/css/bundle.min.css', 'resources/css/app.css'])
    </head>

{{-- <body class="vh-100 vw-100 overflow-hidden"> --}}
<body class="vh-100 vw-100 ">
    {{-- <div class="position-fixed top-0 bottom-0 bg-white vw-100 z-1100 d-flex align-items-center justify-content-center" id="preloader">
        <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div> --}}
    <div class="">
        @include('layouts.header')
        @yield('content')
        @stack('scripts')
    </div>
    @include('layouts.footer_image')
    @include('layouts.footer')

    <script src="/js/bundle.min.js"></script>

</body>

</html>
