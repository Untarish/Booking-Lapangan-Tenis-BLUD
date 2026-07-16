<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="img\blud.jpg" rel="icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Booking Tenis DISPERKIM</title>
</head>

<body class="h-full">

    <div class="min-h-full">

        <x-navbar></x-navbar>

        <x-header>{{ $title }}</x-header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        <x-footer>{{ $title }}</x-footer>
    </div>


</body>

</html>
