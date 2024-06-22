<!doctype html>
<html lang="uz">
    <head>
        @include('components.head')
    </head>
    <body class="bg-light">
        @include('components.header')
        @yield('content')
        @include('components.script')
    </body>
</html>
