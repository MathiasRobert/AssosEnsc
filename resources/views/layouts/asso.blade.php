<!doctype html>
<html>
<head>
    @include('includes.head')
    @include('includes.couleurPerso')
</head>
<body>

@include('includes.navbar')

<div class="wrapper">

    @include('includes.carouselAsso')

    <div class="main main-raised">
        <div class="section">

            @yield('content')

        </div>

        <footer class="footer">
            @include('includes.footer')
        </footer>
    </div>
</div>
</body>

@include('includes.script')

</html>