@props(['active'])

@php
    $classes = $active ?? false ? 'font-bold block py-2 pl-3 pr-4 text-yellow-500 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 transition duration-150 ease-in-out' : 'font-bold block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-300 hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-yellow-500 lg:p-0 dark:text-gray-300 lg:dark:hover:text-gray-300 dark:hover:bg-gray-500 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
