<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to SendNotes</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <wireui:scripts />
    @vite(['resources/css/app.css'])

</head>

<body class="flex flex-col min-h-screen antialiased bg-[#14435b] ">

    <header class="w-full bg-[#023047] text-white">
        <div class="px-5 py-4">
            @auth
                <livewire:layout.navigation />
            @else
                <div class="flex items-center justify-start py-4 space-x-4">
                    <a href="{{ route('login') }}"
                        class="px-3 py-2 text-sm font-semibold text-white bg-[#fb8500] rounded-lg shadow-lg hover:bg-[#e97c00]">
                        Login
                    </a>
                </div>
            @endauth
        </div>
    </header>

    <!-- Main Content -->
    <main
        class="flex flex-col items-center justify-center flex-grow p-4 mx-4 my-5 mb-8 font-bold rounded-lg shadow-sm md:p-8 md:mx-20">
        <div class="flex flex-col items-center justify-center w-full p-4 m-4 text-center">
            <h1 class="mb-4 text-3xl font-bold p-4 rounded-lg text-[#fff] md:text-4xl">
                Welcome to SendNotes
            </h1>

            <a href="{{ route('register') }}"
                class="px-3 py-2 my-6 text-sm font-semibold text-white bg-[#219ebc] rounded-lg shadow-lg hover:bg-[#1a8cbc] md:px-6 md:py-3">
                Get Started
            </a>
        </div>

        <div class="text-center">
            <p class="mb-6 text-lg text-white md:text-2xl">
                A simple and secure way to manage and send your notes.
            </p>
            <p class="mb-6 text-base text-gray-400">
                Our application offers a streamlined interface to create, organize, and share notes effortlessly.
                Whether you're tracking your tasks or saving important information, SendNotes makes it easy and
                efficient.
            </p>
        </div>
    </main>

    <div class="w-3/4 mx-auto my-6 border border-gray-300 md:my-10"></div>

    <!-- Features Section -->
    <section class="p-6 mx-4 my-6 rounded-lg shadow-lg md:p-8 md:mx-20 md:my-10">
        <h1 class="p-3 mx-auto mb-10 text-3xl font-bold text-center bg-[#ffb703] text-white md:text-4xl">
            Features
        </h1>
        <div class="grid grid-cols-1 gap-6 p-4 mt-6 md:grid-cols-2 lg:grid-cols-2">
            <!-- Top Row -->
            <div
                class="flex flex-col items-center p-6 text-center bg-gray-800 rounded-lg shadow-sm md:col-span-1 lg:col-span-1">
                <h3 class="mb-2 text-lg font-semibold text-[#ffb703] md:text-xl">Organize Notes</h3>
                <p class="text-white">
                    Keep your notes organized with categories and tags for easy retrieval.
                </p>
            </div>
            <div
                class="flex flex-col items-center p-6 text-center bg-gray-800 rounded-lg shadow-sm md:col-span-1 lg:col-span-1">
                <h3 class="mb-2 text-lg font-semibold text-[#ffb703] md:text-xl">Secure Sharing</h3>
                <p class="text-white">
                    Share your notes securely with others using our encrypted sharing options.
                </p>
            </div>
            <!-- Bottom Row -->
            <div
                class="flex flex-col items-center p-6 text-center bg-gray-800 rounded-lg shadow-sm md:col-span-2 lg:col-span-3">
                <h3 class="mb-2 text-lg font-semibold text-[#ffb703] md:text-xl">Access Anywhere</h3>
                <p class="text-white">
                    Access your notes from any device, anywhere, with our seamless cloud integration.
                </p>
            </div>
        </div>
    </section>

    <x-footer />

</body>

</html>
