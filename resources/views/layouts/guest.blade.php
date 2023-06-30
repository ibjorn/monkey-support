<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data :class="$store.darkMode.on && 'dark'">

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
</head>

<body class="font-sans antialiased text-gray-900">
    <div class="py-4 bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-end max-w-screen-xl px-4 mx-auto">
            <div class="flex items-center pl-2 lg:order-2">
                {{-- darkmode toggle --}}
                <div class="flex items-center pr-2">
                    <x-utility.dark-mode-toggle />
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 dark:bg-gray-900 sm:justify-center sm:pt-0">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 text-yellow-500 fill-current" />
            </a>
        </div>

        <div
            class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:max-w-md sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('darkMode', {
                init() {
                    const colorMode = localStorage.getItem('dark')
                    const preferredColorMode = window.matchMedia(
                        '(prefers-color-scheme: dark)'
                    ).matches

                    if (colorMode === null) {
                        localStorage.setItem('dark', preferredColorMode)
                    }

                    this.on = localStorage.getItem('dark') === 'true'
                },

                on: false,

                changeColor() {
                    this.on ?
                        localStorage.setItem('dark', true) :
                        localStorage.setItem('dark', false)
                },

                toggle() {
                    this.on = !this.on
                    this.changeColor()
                },
            })


        })
    </script>
</body>

</html>
