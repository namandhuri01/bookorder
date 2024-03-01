<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Book Store</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        {{-- <link href="{{asset('css/frontend/bootstrap.css')}}" rel="stylesheet" /> --}}
        <link href="{{asset('css/frontend/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css/frontend/star-rating.min.css')}}" rel="stylesheet" />
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        @stack('css')
    </head>
    <body>
        <!-- Navigation-->
         @include('frontend.partial.nav')
        
        <!-- Header-->
         @include('frontend.partial.header')
        <!-- Section-->
        @yield('content')
        <!-- Footer-->
         @include('frontend.partial.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/frontend/scripts.js')}}"></script>
        <script src="{{asset('js/frontend/star-rating.min.js')}}"></script>
        <script src="{{asset('js/frontend/show-rating.js')}}"></script>
        @stack('scripts')
    </body>
</html>
