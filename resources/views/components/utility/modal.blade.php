@props(['showModal', 'title' => 'Modal'])

<div x-show="showModal" {{-- class="bg-white/70 backdrop-blur-md" 
            :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }" --}}
    class="fixed inset-0 z-50 flex items-center justify-center transition-all transform bg-white/70 backdrop-blur-md"
    x-on:click="show = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0">
    <!--Dialog-->
    <div x-show="showModal"
        class="w-11/12 px-6 py-4 mx-auto text-left bg-white rounded shadow-lg dark:bg-gray-900 md:max-w-md"
        @click.away="showModal = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-50"
        x-transition:leave-end="opacity-0 scale-0">

        <!--Title-->
        <div class="flex items-center justify-between pb-3">
            <p class="text-2xl font-bold text-gray-900 dark:text-gray-200">{{ $title }}</p>
            <div class="z-50 cursor-pointer" @click="showModal = false">
                <svg class="text-gray-900 fill-current dark:text-gray-200" xmlns="http://www.w3.org/2000/svg"
                    width="18" height="18" viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
            </div>
        </div>

        {{ $slot }}

    </div>
    <!--/Dialog -->
</div>
