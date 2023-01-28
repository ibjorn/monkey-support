<nav x-data="{ open: false }" class="py-4 bg-white border-gray-200 dark:bg-gray-800">

    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">

        <!-- Logo -->
        <div class="flex items-center justify-between p1-2">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block w-auto text-gray-800 fill-current h-7 dark:text-gray-200 sm:h-12" />
            </a>
            <span class="text-lg font-bold text-gray-800 -tracking-widest dark:text-gray-200 sm:text-4xl">
                Monkey Support
            </span>
        </div>

        <div class="flex items-center pl-2 lg:order-2">
            {{-- darkmode toggle --}}
            <div class="flex items-center pr-2">
                <x-utility.dark-mode-toggle />
            </div>

            {{-- button --}}
            @auth
                <button @click="showModal = true"
                    class="rounded-lg bg-yellow-400 px-4 py-2 text-sm font-semibold text-black hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 sm:mr-2 lg:mr-0 lg:px-5 lg:py-2.5">Support
                </button>
            @else
                <button @click="showModal = true"
                    class="rounded-lg bg-yellow-400 px-4 py-2 text-sm font-semibold text-black hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 sm:mr-2 lg:mr-0 lg:px-5 lg:py-2.5">Login
                </button>
            @endauth

            {{-- hamburger menu --}}
            <div class="flex items-center -mr-2 lg:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            @auth
                <!-- Settings Dropdown -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <x-nav.dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 font-semibold leading-4 text-gray-900 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-yellow-500 focus:outline-none dark:bg-gray-400 dark:hover:text-white">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-nav.dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-nav.dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-nav.dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-nav.dropdown-link>
                            </form>
                        </x-slot>
                    </x-nav.dropdown>
                </div>
            @endauth
        </div>

        {{-- nav --}}
        <div class="items-center justify-end hidden w-full px-10 lg:order-1 lg:flex lg:w-auto lg:grow">
            <ul class="flex flex-col mt-4 font-medium lg:mt-0 lg:flex-row lg:space-x-8">
                <li>
                    <x-nav.link :href="route('home')" :active="request()->routeIs('home')">Home</x-nav.link>
                </li>
                @auth
                    <li>
                        <x-nav.link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav.link>
                    </li>
                @else
                    <li>
                        <x-nav.link :href="route('register')" :active="request()->routeIs('register')">Register</x-nav.link>
                    </li>
                @endauth
            </ul>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }"
            class="relative hidden w-full h-full bg-white z-100 dark:bg-gray-800 lg:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-nav.responsive-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav.responsive-link>
            </div>

            @auth
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                    <div class="px-4">
                        <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-nav.responsive-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-nav.responsive-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-nav.responsive-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-nav.responsive-link>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
