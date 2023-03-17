<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="copyright" content="Создание сайтов - Kirill Philips, https://vk.com/id90191490, 2021">
    <meta name="author"
          content="Kirill Philips, https://vk.com/id90191490, создание сайтов, поддержка сайтов, продвижение сайтов">
    <title>{{ $settings["site.title"]->value }} {{ $meta ? " - " . $meta->headline : "" }}</title>
    <meta name="description" content="{{ $settings["site.description"]->value }}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;0,700;0,800;0,900;1,400;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}">
    <meta name="theme-color" content="#5f4b8b">
    <script defer="defer" src="{{ asset('js/main.js') }}"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    @include('templates.komok_index.header')
    @yield('body')
    @include('templates.komok_index.footer')
</body>
</html>
