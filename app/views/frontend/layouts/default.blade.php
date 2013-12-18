<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- Basic Page Needs --}}
        <meta charset="utf-8" />
        {{-- @include ('site.elements.mobileredirect') --}}
        <title>
            @section('title')
                Home
            @show
            | Just for Funny
        </title>
        @section('meta-section')
            <meta name="description" content="Oh Khmer for Funny" />
            <meta name="robots" content="index, follow">
        @show

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS
        ================================================== -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">
        @section('custom-style')
        @show
        <style>
        @section('styles')
        @show
        </style>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicons
        ================================================== -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
        <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">

    </head>

    <body>
        <!-- To make sticky footer need to wrap in a div -->
        <div id="wrap">
        
        <header id="siteHeader" class="site-header">
            <!-- Navbar -->
                @include('frontend.elements.mainmenu')
            <!-- ./ navbar -->
        </header>
        <!-- Container -->
        <div class="container">
            <!-- Notifications -->
            @include('notifications')
            <!-- ./ notifications -->
            <!-- Content -->
            @yield('content')
            <!-- ./ content -->
        </div>
        <!-- ./ container -->

        <!-- the following div is needed to make a sticky footer -->
        <div id="push"></div>
        </div>
        <!-- ./wrap -->

        <div id="footer">
          @include('frontend.elements.footer')
        </div>
        {{-- modal box upload--}}
        @include('frontend.elements.upload')
        <!-- Javascripts -->
        <script>
        var baseURL = { upload: "{{URL::to('/images/upload')}}" };
        </script>
        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        @section('custom-script')
        @show
        
        <script>
        @section('scripts')
        @show
        $("#btnUpload").on('click', function(){
            $('#uploadForm').modal();
        });
        
        </script>
        {{-- @include ('site.elements.analytics') --}}
    </body>
</html>
