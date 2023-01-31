@props([
    'badgeColor' => 'green',
])

<span
    class="bg-{{ $badgeColor }} inline-block whitespace-nowrap rounded-full py-1 px-2.5 text-center align-baseline text-xs font-medium capitalize leading-none text-white">
    {{ $slot }}
</span>
