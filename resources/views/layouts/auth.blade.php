<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Medical Innovation & Technology</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ url('pages/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('pages/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('pages/css/select.css') }}">


    {!! SEOMeta::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    {!! JsonLdMulti::generate() !!}
    {!! SEO::generate() !!}
    {!! SEO::generate(true) !!}


    {!! app('seotools')->generate() !!}
    {{ Html::favicon('/pages/img/favicon.ico') }}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">



    @stack('css')

</head>

<body>

    @yield('content')

    <script src="{{ url('pages/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('pages/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('pages/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('pages/js/select.js') }}" type="text/javascript"></script>
    <script src="{{ url('pages/js/main.js') }}" type="text/javascript"></script>

    @stack('scripts')

</body>

</html>
