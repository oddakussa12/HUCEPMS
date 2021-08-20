<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('style')
    
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div id="app">

        @include('layouts.navbar')
        
        <div class="main flex flex-wrap justify-end mt-16">
           
                @yield('content')  
        </div>
    </div>

     {{-- footer of the page --}}
     <div class="container-fluid" style="height:300px; background-color:#2B6CB0;color:white;margin-top:30px;">
        <div class="row">
            <div class="col-sm-3" style="margin-top:30px;padding-left:5%;padding-right:5%;" >
                <p><a href="#" style="color:white;font-size:22px;" >Important Links</a></p>
                <p><a href="#" style="color:white;" >Programmes</a></p>
                <p><a href="#" style="color:white;" >Applay to programmes</a></p>
                <p><a href="#" style="color:white;" >Registrar</a></p>
                <p><a href="#" style="color:white;" >Students</a></p>
            </div>
            <div class="col-sm-6" style="margin-top:30px;">
                <img src="{{ asset('images/logo_banner_4.png')}}" alt="slider one" style="width:100%;height:230px;" >
                {{-- <p><a href="#" style="color:white;" >Home</a></p>
                <p><a href="#" style="color:white;" >Home</a></p>
                <p><a href="#" style="color:white;" >Home</a></p>
                <p><a href="#" style="color:white;" >Home</a></p> --}}
            </div>
            <div class="col-sm-3" style="margin-top:30px;padding-left:5%;padding-right:5%;">
                <p><a href="#" style="color:white;font-size:22px;" >Address</a></p>
                <p><a href="#" style="color:white;" >Haramaya University,</a></p>
                <p><a href="#" style="color:white;" >P.O. Box 138,</a></p>
                <p><a href="#" style="color:white;" >Dire Dawa,</a></p>
                <p><a href="#" style="color:white;" >Ethiopia</a></p>
                <p><a href="#" style="color:white;" >haramaya@haramaya.edu.et</a></p>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        $(function() {
            $( "#opennavdropdown" ).on( "click", function() {
                $( "#navdropdown" ).toggleClass( "hidden" );
            })
        })
    </script>
    

    @stack('scripts')
</body>
</html>