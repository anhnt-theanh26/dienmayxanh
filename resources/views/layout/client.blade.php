<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.element.head')
    @yield('css')
    @yield('seo')
</head>

<body class="bg-light">
    @include('sweetalert::alert'){{-- libary alert --}}
    <!-- header  -->
    <header class="position-fixed w-100" style="z-index: 10; top: 0;">
        @include('client.element.header')
    </header>
    <!--hết header  -->

    <main style="margin-top: 150px">
        @yield('content')
    </main>

    <footer>
        @include('client.element.footer')
    </footer>


    @include('client.element.script')

    @yield('js')
</body>

</html>
