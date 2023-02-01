<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Medical Innovation & Technology</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEOMeta::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    {!! JsonLdMulti::generate() !!}
    {!! SEO::generate() !!}
    {!! SEO::generate(true) !!}

    {!! app('seotools')->generate() !!}


    {{ Html::favicon('/pages/img/favicon.ico') }}

    @yield('head')

    <link rel="stylesheet" href="{{ url('/managers/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('/managers/css/main.css') }}">
    <link rel="stylesheet" href="{{ url('/managers/css/quill.css') }}">
    <link rel="stylesheet" href="{{ url('/managers/css/simplebar.min.css') }}">

    <link href="{{ url('/managers/css/dropzone.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('/managers/css/select2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('/managers/css/default.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('/managers/css/default.date.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('/managers/css/default.time.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('/managers/css/grid.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('/managers/css/all.css') }}" rel="stylesheet" type="text/css">


    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet" />
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css" />


    @stack('css')


</head>

<body>


    @include ('managers.includes.sidebar')

    <div class="view-wrapper view-wrapper-full is-pushed-block" data-mobile-item="#home-sidebar-menu-mobile" data-sidebar-open="">
        @yield('content')
    </div>


    @include('managers.partials.modals.delete')

    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>

    <script src="{{ url('/managers/js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ url('/managers/js/app.js') }}" type="text/javascript"></script>
    <script src="{{ url('/managers/js/functions.js') }}" type="text/javascript"></script>
    <script src="{{ url('/managers/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ url('/managers/js/components.js') }}" type="text/javascript"></script>
    <script src="{{ url('/managers/js/popover.js') }}" type="text/javascript"></script>
    <script src="{{ url('/managers/js/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ url('/managers/js/touch.js') }}" type="text/javascript"></script>
    <script src="{{ url('/managers/js/landing.js') }}" type="text/javascript"></script>

    <script src="{{ url('/managers/js/quill.js') }}" type="text/javascript"></script>
    <script src="{{ url('/managers/js/picker.js') }}" type="text/javascript"></script>
    <script src="{{ url('/managers/js/picker.date.js') }}" type="text/javascript"></script>
    <script src="{{ url('/managers/js/picker.time.js') }}" type="text/javascript"></script>
    <script src="{{ url('/managers/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ url('/managers/js/validate.js') }}" type="text/javascript"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    @stack('scripts')

    @include ('managers.partials.modals.delete')
</body>

</html>
