<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
        <title>@yield('title')</title>
        @yield('head')
    </head>
    <body>
        @include('includes.header')

        <div class="container p-5">
            <div class="starter-template">
                @yield('content')
            </div>
        </div>

        @include('includes.footer')
        <script src="/js/bootstrap.js"></script>
    </body>
</html>
