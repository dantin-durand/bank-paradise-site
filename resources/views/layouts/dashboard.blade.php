<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <title>Bank Paradise: @yield('title')</title>
    <meta name="viewport" content="height=device-height, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="/img/favicon.svg" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <meta name="description" content="@yield('description')">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ config('app.env') === 'production' ? secure_asset('css/reset.css') : asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ config('app.env') === 'production' ? secure_asset('css/app.css') : asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ config('app.env') === 'production' ? secure_asset('css/navbar/default.css') : asset('css/navbar/default.css') }}">
    <link rel="stylesheet" href="{{ config('app.env') === 'production' ? secure_asset('css/dashboard.css') : asset('css/dashboard.css') }}">

</head>

<body>
    <x-navbar-account />
    @yield('content')
    <x-footer type="authenticate" />
    <script src="https://kit.fontawesome.com/ee9709fe10.js" crossorigin="anonymous"></script>
    <script src="{{ config('app.env') === 'production' ? secure_asset('js/navbar.js') : asset('js/navbar.js') }}"></script>
</body>

</html>