<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <title>@yield('titulo', 'TVUMSA')</title>
    @stack('css')
</head>
<body>
    <header></header>

    @yield('content')

    <footer></footer>
</body>
</html>