<!doctype html>
<html lang="uz">
    <head>
        @include('components.head')
    </head>
    <body class="bg-light">
        @if(!(request()->route()->getName()==='login'))
            @include('components.header')
        @endif
        @yield('content')
        @include('components.script')
    </body>
</html>
