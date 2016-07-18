<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta author="raru">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0D47A1">
    <title>
        @yield('page_title') | CURMO(クルモ)
    </title>

    <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">

    @yield('styles')
</head>
<body>

<div class="container-fluid">

    @section('header')
        @include('layouts.header')
    @show

    @yield('body')

    @section('footer')
        @include('layouts.footer')
    @show

</div>

<script src="{{ elixir('js/app.js') }}"></script>



@yield('scripts')
</body>
</html>
