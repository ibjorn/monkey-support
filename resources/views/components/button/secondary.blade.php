<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-lg bg-transparent border-2 border-gray-900 dark:border-gray-200 px-4 py-2 text-sm font-semibold text-gray-900 dark:text-gray-200 hover:bg-yellow-400 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 sm:mr-2 lg:mr-0 lg:px-5 lg:py-2.5']) }}>
    {{ $slot }}
</button>
