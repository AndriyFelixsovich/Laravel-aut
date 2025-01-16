<!doctype html>
<html lang="ua">
<head>
    @include('web.layout.head')
    <title>@yield($title ?? 'Головна')</title>
</head>
<body>
<header>
    @yield
</header>
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-9">
        @yield('content')
    </div>
</div>
</body>
</html>
