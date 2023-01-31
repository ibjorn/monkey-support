<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-lg bg-red-400 px-4 py-2 text-sm font-semibold text-black hover:bg-red-500 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 sm:mr-2 lg:mr-0 lg:px-5 lg:py-2.5']) }}>
    {{ $slot }}
</button>
