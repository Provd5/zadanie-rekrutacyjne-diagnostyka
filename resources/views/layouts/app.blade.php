<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path("build/manifest.json")) || file_exists(public_path("hot")))
        @vite(["resources/css/app.css", "resources/js/app.js"])
    @endif

    <title>{{ $title ? $title . " | " : "" }}{{ config("app.name", "Zadanie rekrutacyjne") }}</title>
</head>


<body class="flex min-h-screen">
    {{ $slot }}
</body>

</html>
