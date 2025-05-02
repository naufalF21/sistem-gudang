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
            <span>API Documentation: </span><a href="https://postman.co/workspace/My-Workspace~e63a8d8b-c82e-4684-8f67-4dd9f0c22362/collection/11047813-daa7a9c1-6f04-43af-969f-b973fe5c12db?action=share&creator=11047813"
                class="text-blue-500 hover:underline">click here</a>
        </div>
    </div>
</body>

</html>
