@props([
    'placeholder' => null,
])

<div class="flex">
    <select
        {{ $attributes->merge(['class' => 'rounded-md shadow-sm form-select block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-400 focus:outline-none focus:shadow-outline-black focus:border-yellow-500 dark:focus:border-yellow-600 focus:ring-yellow-500 dark:focus:ring-yellow-600 transition ease-in-out duration-150']) }}>
        @if ($placeholder)
            <option disabled value="">{{ $placeholder }}</option>
        @endif
        {{ $slot }}
    </select>
</div>
