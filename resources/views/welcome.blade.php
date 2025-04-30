<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <div class="flex flex-col justify-center items-center h-screen gap-2">
        <h1>REST API Sistem Gudang</h1>
        <div class="flex gap-2">
            <span>API Documentation: </span><a href="http://127.0.0.1:8000/api/documentation"
                class="text-blue-500 hover:underline">click here</a>
        </div>
    </div>
</body>

</html>
