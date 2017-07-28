<!doctype html>
<html>
<head>
    @include('includes.head')
    <link rel="stylesheet" href="/css/couleurAsso/{!! $association->id !!}">
</head>
<body>

@include('includes.header')

<div class="wrapper">

    @include('includes.carousel')

    <div class="main">
        <div class="container">

            <div class="row">

                @yield('content')

            </div>

            <footer class="row">
                @include('includes.footer')
            </footer>
        </div>
    </div>
</div>
</body>

@include('includes.script')

</html>