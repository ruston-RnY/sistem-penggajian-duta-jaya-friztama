<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes.styles')
    @stack('custom-style')
    <style>
        .navbar .navbar-nav > li.active {
            background: transparent;
        }
        .navbar .navbar-nav > .active > a, .navbar .navbar-nav > .active > a:focus, .navbar .navbar-nav > .active > a:hover {
            color: #03a9f3;
        }
    </style>
</head>

<body>
    <!-- Content -->
    @yield('content')
    <!-- /.content -->

    <!-- Scripts -->
    @stack('before-script')
    @include('includes.scripts')
    @stack('after-script')
</body>
</html>
