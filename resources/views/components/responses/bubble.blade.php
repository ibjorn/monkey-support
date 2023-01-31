@props([
    'reply' => 'reply',
    'avatar' => 'avatar',
    'user' => true,
])

<div class="{{ $user ? 'justify-end' : '' }} flex items-end">
    <div
        class="{{ $user ? 'items-end order-1' : 'items-start order-2' }} mx-2 flex max-w-xs flex-col items-end space-y-2 text-sm">

        <div>
            <span
                class="{{ $user ? 'text-white bg-gray-600 rounded-br-none' : 'text-gray-600 bg-yellow-300 rounded-bl-none' }} inline-block rounded-lg rounded-br-none px-4 py-2">
                {{ $reply }}
            </span>
        </div>

    </div>
    <img src="{{ $avatar }}" alt="Responder avatar"
        class="{{ $user ? 'order-2' : 'order-1' }} h-6 w-6 rounded-full" />
</div>
