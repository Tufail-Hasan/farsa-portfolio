<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Md. Farsa Mia | Laravel Developer')</title>

    <meta name="description" content="Md. Farsa Mia - Junior Laravel Developer Portfolio">

    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>
<body>

    @yield('content')

    <script src="{{ asset('js/portfolio.js') }}"></script>

</body>
</html>
