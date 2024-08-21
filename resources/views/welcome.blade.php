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

<body class="flex flex-col min-h-screen antialiased bg-[#14435b] max-w-[1200px] mx-auto">


    <!-- Main Content -->
    <main
        class="flex flex-col items-center justify-center flex-grow p-4 mx-4 my-2 font-bold rounded-lg shadow-sm md:p-8 md:mx-20">
        <div class="flex flex-col items-center justify-center w-full gap-5 p-4 m-4 text-center">
            <h1 class=" text-3xl font-bold py-3 px-6 rounded-lg bg-[#ffb703] text-white md:text-4xl">
                Welcome to SendNotes
            </h1>
            <div class="flex items-center justify-end gap-4 px-8 ">
                <!-- Show Dashboard if authenticated -->
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="px-3 py-2 flex justify-center items-center text-sm font-semibold text-white bg-[#8ecae6] rounded-lg shadow-lg hover:bg-[#6faed1] md:px-6 md:py-3">
                        Dashboard
                    </a>
                @endauth

                <!-- Show Login and Get Started if not authenticated -->
                @guest
                    <a href="{{ route('login') }}"
                        class="px-3 py-2 text-sm font-semibold text-white bg-[#fb8500] rounded-lg shadow-lg hover:bg-[#e97c00] md:px-6 md:py-3">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                        class="px-3 py-2 text-sm font-semibold text-white bg-[#219ebc] rounded-lg shadow-lg hover:bg-[#1a8cbc] md:px-6 md:py-3">
                        Get Started
                    </a>
                @endguest
            </div>


        </div>

        <div class="text-center">
            <p class="mb-6 text-lg text-white md:text-2xl">
                A simple and secure way to manage and send your notes.
            </p>
            <p class="text-base text-gray-400">
                Our application offers a streamlined interface to create, organize, and share notes effortlessly.
                Whether you're tracking your tasks or saving important information, SendNotes makes it easy and
                efficient.
            </p>
        </div>
    </main>

    <!-- Features Section -->
    <section class="p-6 mx-4 my-6 rounded-lg shadow-lg md:p-8 md:mx-20 md:my-10">
        <h1
            class="w-2/4 p-3 mx-auto mb-10 text-3xl font-bold text-center text-white border-b border-gray-400 md:text-4xl">
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
