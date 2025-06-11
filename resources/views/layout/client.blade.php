<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.element.head')
    @yield('css')
    <style>
        :root {
            --main-color: {{ $setting->main_color ?? '#000000' }};
            --secondary-color: {{ $setting->secondary_color ?? '#000000' }};
        }
    </style>
</head>

<body class="bg-light">
    @include('sweetalert::alert'){{-- libary alert --}}
    <!-- header  -->
    {{-- <header class="position-fixed w-100" style="z-index: 10; top: 0;"> --}}
    <header>
        @include('client.element.header')
    </header>
    <!--hết header  -->

    {{-- <main style="margin-top: 150px"> --}}
    <main>
        @yield('content')
    </main>

    <footer>
        @include('client.element.footer')
    </footer>


    @include('client.element.script')

    @yield('js')
</body>

</html>
