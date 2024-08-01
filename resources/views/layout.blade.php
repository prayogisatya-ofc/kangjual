<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Kang Koding">
        <meta name="description" content="Temukan solusi aplikasi dan website yang siap pakai, dirancang untuk mempercepat pengembangan dan meningkatkan produktivitas mu.">
        <meta property="og:image" content="@yield('image', env('APP_URL').'/favicon.ico')" />

        <title>@yield('title')</title>

        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('partials.navbar')

        @yield('content')

        @include('partials.footer')

        @yield('script')
    </body>
</html>
