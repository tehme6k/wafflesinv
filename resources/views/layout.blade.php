
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 CRUD Application - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('style')
</head>
<body>

<div class="container">
    @include('nav')
    @yield('content')
</div>
@stack('scripts')
</body>
</html>
