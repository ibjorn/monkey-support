<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Manage Tickets') }}
        </h2>
    </x-slot>

    <section class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col items-center max-w-lg mx-auto">
                        <div class="max-w-lg mx-auto">
                            @if (session()->has('success'))
                                <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                                    <svg class="inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <span class="font-medium">Success!</span> {{ session()->get('success') }}
                                    </div>
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="flex p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg"
                                    role="alert">
                                    <svg class="inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <span class="font-medium">Warning!</span> {{ session()->get('error') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="max-w-lg mx-auto">
                            @if (!$addTicket)
                                <x-button.primary wire:click="addTicket">
                                    Submit New Ticket
                                </x-button.primary>
                            @endif
                        </div>
                        <div
                            class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:max-w-md sm:rounded-lg">

                            @if ($addTicket || $updateTicket)
                                <x-tickets.add-update :action="$addTicket ? 'submit' : 'update'" />
                            @endif

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
                        <x-table.body>

                            <x-slot name="head">
                                <tr>
                                    <x-table.heading>
                                        Ticket ID
                                    </x-table.heading>
                                    <x-table.heading>
                                        Subject
                                    </x-table.heading>
                                    <x-table.heading>
                                        Status
                                    </x-table.heading>
                                    <x-table.heading>
                                        Action
                                    </x-table.heading>
                                </tr>
                            </x-slot>

                            <x-slot name="body">

                                @if (count($tickets) > 0)
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <x-table.cell>
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div>
                                                            {{ $ticket->id }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </x-table.cell>

                                            <x-table.cell>
                                                <div>
                                                    {{ $ticket->subject }}
                                                </div>
                                            </x-table.cell>

                                            <x-table.cell>
                                                <div>
                                                    {{ $ticket->status }}
                                                </div>
                                            </x-table.cell>

                                            <x-table.cell>
                                                <x-button.primary wire:click="editTicket({{ $ticket->id }})">
                                                    Edit
                                                </x-button.primary>
                                                <x-button.secondary wire:click="deleteTicket({{ $ticket->id }})">
                                                    Delete
                                                </x-button.secondary>
                                            </x-table.cell>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <x-table.cell>
                                            <div>
                                                Not tickets found.
                                            </div>
                                        </x-table.cell>
                                    </tr>
                                @endif
                            </x-slot>
                        </x-table.body>
                        {{ $tickets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>