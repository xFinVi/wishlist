<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-100">

    <div class="flex items-center justify-between gap-5 px-5 py-5 ">
        <div class="">
            <x-application-logo class="w-24 h-24 fill-current text-primary"></x-application-logo>
        </div>
        <div>
            @if (Route::has('login'))
                <livewire:welcome.navigation class="items-end justify-end w-full" />
            @endif
        </div>





    </div>

    <div class="flex items-center justify-center p-6 mx-auto max-w-7xl lg:p-8">
        <x-button primary href="{{ route('register') }}">Get Started</x-button>
    </div>



</body>

</html>
