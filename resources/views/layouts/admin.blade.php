<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon Icon -->
       
        <meta name="msapplication-TileColor" content="#00aba9">
        <meta name="theme-color" content="#ffffff">

        <title>{{ __('Book Store') }}</title>

        <link href="{{ asset('css/common.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Favicon-->
        @stack('css')
    </head>
    <body> 
        <!-- Sidebar -->
        @include('admin.navs.sidebar')
        <div class="page">
            <!-- Top Header -->
            @include('admin.navs.header')
            <!-- Content or view that extends this layout -->
            @yield('content')
        </div>
        @hasSection('model')
            @yield('model')
        @endif
        <script src="{{ asset('js/common.js') }}"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
        <script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>

        @stack('scripts')
        <style type="text/css">
            .error {
                color:red;
            }
        </style>
    </body>
</html>