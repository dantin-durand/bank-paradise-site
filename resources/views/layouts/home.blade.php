<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <title>Accueil - Bank Paradise</title>
    <meta name="viewport" content="height=device-height, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="/img/favicon.svg" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ config('app.env') === 'production' ? secure_asset('css/reset.css') : asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ config('app.env') === 'production' ? secure_asset('css/app.css') : asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ config('app.env') === 'production' ? secure_asset('css/navbar/default.css') : asset('css/navbar/default.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body class="home__container">
    <x-navbar-default />
    @yield('content')
    <x-footer type="default" />
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>

        const swiper = new Swiper('.swiper-container', {
            loop: true,
            navigation: {
                nextEl: '.next__btn',
                prevEl: '.prev__btn',
            },
            slidesPerView: 3,
            spaceBetween: 30,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                720: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    </script>
</body>

</html>