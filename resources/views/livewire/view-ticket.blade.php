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
                    <div class="py-2">
                        <a href="{{ url('/ticket/') }}"
                            class="rounded-lg border-2 border-gray-900 bg-transparent px-2 py-1 text-xs font-semibold text-gray-900 hover:bg-yellow-400 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:border-gray-200 dark:bg-yellow-600 dark:text-gray-200 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 sm:mr-2 lg:mr-1 lg:px-3 lg:py-1.5">
                            Back
                        </a>
                    </div>
                    <div class="flex flex-col items-start max-w-lg mx-auto">
                        <div class="w-full px-6 py-2">
                            <h3 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                                {{ $ticket->subject }}</h3>
                        </div>
                        <div class="w-full px-6 py-2">
                            <span>{{ $ticket->description }}</span>
                        </div>
                        <div class="flex items-center justify-end w-full px-6 py-2">
                            <x-utility.badge :badgeColor="$ticket->status_color">
                                {{ $ticket->status }}
                            </x-utility.badge>
                        </div>

                        <div class="flex items-center justify-end w-full px-6 py-2">
                            <x-button.primary wire:click="closeTicket()" type="button"
                                class="px-2 py-1 text-sm lg:px-3 lg:py-1.5">
                                Close Ticket
                            </x-button.primary>
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
                                    <x-responses.bubble :wire:key="$response->id" :reply="$response->reply" :avatar="$response->user->avatar()"
                                        :user="Auth::id() === $response->user_id" />
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
