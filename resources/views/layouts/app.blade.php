<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">


    <title>@yield('title','TIMS')</title>

    <!-- Font Awesome CSS-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.default.css')}}">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('/css/toastr.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('/css/buttons.dataTables.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('/css/fontawesome.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('/css/fontastic.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('/icons-reference/styles.css')}}"> --}}
    @yield('styles')
</head>

<body>

    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{asset('js/custom.js') }}"> </script> --}}
    {{-- <script src="{{ asset('js/toastr.min.js') }}" > </script> --}}
    {{-- <script src="{{ asset('js/jquery.dataTables.min.js') }}" > </script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"> </script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"> </script> --}}
    {{-- <script src="{{ asset('js/buttons.flash.min.js') }}" > </script>
    <script src="{{ asset('js/jszip.min.js') }}"> </script>
    <script src="{{ asset('js/pdfmake.min.js') }}"> </script>
    <script src="{{ asset('js/vfs_fonts.js') }}"> </script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"> </script>
    <script src="{{ asset('js/buttons.print.min.js') }}"> </script>
    <script src="{{ asset('js/vue.js') }}"> </script>
    <script src="{{ asset('js/front.js') }}"> </script>
    <script src="{{ asset('js/charts-home.js') }}"> </script>
    <script src="{{ asset('js/charts-custom.js') }}"> </script>
    <script src="{{ asset('js/jquery.cookie.js') }}"> </script> --}}
    @yield('javascript')
</body>

</html>