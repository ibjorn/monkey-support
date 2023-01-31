<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Viewing Ticket: ' . $ticket->id) }}
        </h2>
    </x-slot>

    <section class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col items-start max-w-lg mx-auto">
                        <div class="w-full px-6 py-2">
                            <h3 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                                {{ $ticket->subject }}</h3>
                        </div>
                        <div class="w-full px-6 py-2">
                            <span>{{ $ticket->description }}</span>
                        </div>
                        <div class="flex items-center justify-end w-full px-6 py-2">
                            <span class="block capitalize">{{ $ticket->status }}</span>
                        </div>

                        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white dark:bg-gray-800">
                            <x-responses.add />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="px-6 pb-6">
                    <div class="container mx-auto">
                        @if (count($responses) > 0)
                            <div
                                class="flex flex-col max-w-xl p-3 mx-auto space-y-4 overflow-y-auto scrolling-touch scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2">
                                @foreach ($responses as $response)
                                    <div class="chat-message">
                                        <div class="flex items-end justify-end">
                                            <div
                                                class="flex flex-col items-end order-1 max-w-xs mx-2 space-y-2 text-xs">
                                                <div><span
                                                        class="inline-block px-4 py-2 text-white bg-gray-600 rounded-lg">
                                                        {{ $response->reply }}
                                                    </span></div>
                                                <div><span
                                                        class="inline-block px-4 py-2 text-white bg-gray-600 rounded-lg rounded-br-none">Run
                                                        this command sudo chown -R `whoami`
                                                        /Users/your_user_profile/.npm-global/ then install
                                                        the package globally without using sudo</span></div>
                                            </div>
                                            {{-- <img src="{{ auth()->user()->avatar() }}" alt="My profile"
                                                class="order-2 w-6 h-6 rounded-full" /> --}}
                                        </div>
                                    </div>
                                    <div class="chat-message">
                                        <div class="flex items-end">
                                            <div
                                                class="flex flex-col items-start order-2 max-w-xs mx-2 space-y-2 text-xs">
                                                <div><span
                                                        class="inline-block px-4 py-2 text-gray-600 bg-yellow-300 rounded-lg rounded-bl-none">Thanks
                                                        for your message David. I thought I'm alone with this issue.
                                                        Please,
                                                        ? the issue to support
                                                        it :)</span></div>
                                            </div>
                                            {{-- @dd($response->user())
                                            <img src="{{ $response->user()->avatar() }}" alt="My profile"
                                                class="order-1 w-6 h-6 rounded-full"> --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div>
                                There's been no responses to this ticket.
                            </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
