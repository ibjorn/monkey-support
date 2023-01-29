<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data :class="$store.darkMode && 'dark'">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Add Livewire Style -->
    @livewireStyles
</head>

<body class="font-sans antialiased" x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
    <div class="flex flex-col justify-between min-h-screen bg-white dark:bg-gray-900">

        <header class="w-full">
            @include('layouts.navigation')
        </header>

        @if (isset($header))
            <section class="bg-white shadow dark:bg-gray-800">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </section>
        @endif

        <main class="grow">
            {{ $slot }}
        </main>

        <footer class="bg-white dark:bg-gray-800">
            <div class="max-w-screen-xl p-4 py-6 mx-auto md:p-8 lg:p-10 lg:py-8">

                <hr class="my-6 border-gray-200 dark:border-gray-700 sm:mx-auto lg:my-4">

                <div class="text-center">

                    <a href="{{ route('home') }}"
                        class="flex items-center justify-center mb-1 text-2xl font-semibold text-gray-900 dark:text-white">
                        <x-application-logo
                            class="block w-auto text-gray-800 fill-current h-7 dark:text-gray-200 sm:h-10" />
                        <span class="text-2xl font-bold text-gray-800 -tracking-widest dark:text-gray-200">Monkey
                            Support</span>
                    </a>

                    <span class="block text-sm text-center text-gray-500 dark:text-gray-400">
                        © {{ now()->year }} Monkey Support™. All Rights Reserved.
                    </span>

                </div>
            </div>
        </footer>

        @auth
            <x-utility.modal :showModal title="Submit Ticket">
                <x-tickets.add-update />
            </x-utility.modal>
        @endauth
    </div>

    <x-notification />

    <!-- Add Livewire Script -->
    @livewireScripts
</body>

</html>
