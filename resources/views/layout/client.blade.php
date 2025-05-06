<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.element.head')
</head>

<body class="bg-light">
    @include('sweetalert::alert'){{-- libary alert --}}
    <!-- header  -->
    <header>
        @include('client.element.header')
    </header>
    <!--hết header  -->

    <main>
        @yield('content')
    </main>

    <footer>
        @include('client.element.footer')
    </footer>


    @include('client.element.script')
</body>

</html>
