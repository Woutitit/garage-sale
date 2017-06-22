<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Garagesale</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</head>
<body>
<div id="app">
    @include('partials.header')
    @yield('content')
</div>
</body>
</html>
