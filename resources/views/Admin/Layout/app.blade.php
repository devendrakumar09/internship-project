<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <style>

 
    </style>
    @section('external-css')
	@show
</head>
<body>
<div class="wrapper master">
    @include('Admin.Layout.sidebar')
    <div class="content">
        @include('Admin.Layout.navbar')
        
        <div class="content-wrapper">
            <div class="container flude">
                <div class="d-flex bd-highlight bg-white py-4 mb-4">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        @section('page-heading')
                        @show
                    </div>                    
                    <div class="p-2 bd-highlight">
                        @section('page-links')
                        @show
                    </div>                    
                </div>
            </div>
            @section('main-content')

            @show
            
            <div class="line"></div>
        </div>
    </div>
</div>               
        
    @include('Admin.Layout.footer')
    <script>
        $(document).ready(function(){
            $("#sidebarCollapse").on('click', function(){
            $("#sidebar").toggleClass('active');
            });
        });
    </script>  
    @section('external-js')    
	@show
</body>
</html>
