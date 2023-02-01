<div>
    <section class="py-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h3 class="text-xl text-gray-800 font-regular dark:text-gray-100">
                Manage Tickets
            </h3>
        </div>
    </section>

    <section class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="px-6">
                    <div class="container flex flex-wrap mx-auto lg:flex-row">

                        <div class="flex items-center w-1/2">
                            <x-input.text wire:model="filters.search" placeholder="Search ID / subject..."
                                class="px-2 py-1 text-sm lg:px-3 lg:py-1.5" />
                            <x-button.secondary wire:click="resetFilters"
                                class="ml-2 px-2 py-1 text-xs lg:px-3 lg:py-1.5" type="button">
                                Reset
                            </x-button.secondary>
                        </div>

                        <div class="flex justify-end w-1/2 pt-5 lg:pt-0">

                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-5 sm:py-2">
                                <label for="filter-status"
                                    class="block text-sm font-medium leading-5 text-gray-500 sm:mt-px sm:pt-2 md:text-right">
                                    Filter by
                                </label>

                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <x-input.select wire:model="filters.status" id="filter-status"
                                        class="min-w-min px-2 py-1 text-sm lg:px-3 lg:py-1.5">
                                        <option value="" disabled>Status...</option>

                                        @foreach ($statuses as $value => $label)
                                            <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </x-input.select>
                                </div>
                            </div>

                            <div class="ml-3 sm:grid sm:grid-cols-3 sm:items-start sm:gap-5 sm:py-2">
                                <label for="per-page"
                                    class="block text-sm font-medium leading-5 text-gray-500 sm:mt-px sm:pt-2 md:text-right">
                                    Per page
                                </label>

                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <x-input.select wire:model="perPage" id="per-page"
                                        class="min-w-min px-2 py-1 text-sm lg:px-3 lg:py-1.5">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </x-input.select>
                                </div>
                            </div>

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
                                <x-table.row>
                                    <x-table.heading>
                                        ID
                                    </x-table.heading>
                                    <x-table.heading>
                                        Subject
                                    </x-table.heading>
                                    <x-table.heading>
                                        Description
                                    </x-table.heading>
                                    <x-table.heading>
                                        Status
                                    </x-table.heading>
                                    <x-table.heading sortable wire:click="sortBy('created_at')" :direction="$sorts['created_at'] ?? null">
                                        Created
                                    </x-table.heading>
                                    <x-table.heading>
                                        Actions
                                    </x-table.heading>
                                </x-table.row>
                            </x-slot>

                            <x-slot name="body">

                                @if (count($tickets) > 0)
                                    @foreach ($tickets as $ticket)
                                        <x-table.row :wire:key="$ticket->id">
                                            <x-table.cell>
                                                <div>
                                                    {{ $ticket->id }}
                                                </div>
                                            </x-table.cell>

                                            <x-table.cell>
                                                <div>
                                                    {{ $ticket->subject }}
                                                </div>
                                            </x-table.cell>

                                            <x-table.cell>
                                                <div>
                                                    {{ $ticket->description }}
                                                </div>
                                            </x-table.cell>

                                            <x-table.cell>
                                                <div>
                                                    <x-utility.badge :badgeColor="$ticket->status_color">
                                                        {{ $ticket->status }}
                                                    </x-utility.badge>
                                                </div>
                                            </x-table.cell>

                                            <x-table.cell>
                                                <div>
                                                    {{ $ticket->date_for_humans }}
                                                </div>
                                            </x-table.cell>

                                            <x-table.cell>
                                                <div class="flex items-center">
                                                    <a href="{{ url('/ticket/' . $ticket->id) }}"
                                                        class="rounded-lg bg-yellow-400 px-2 py-1 text-xs font-semibold text-black hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 sm:mr-2 lg:mr-1 lg:px-3 lg:py-1.5">
                                                        Respond
                                                    </a>

                                                    <x-button.danger x-data=""
                                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-ticket-deletion')"
                                                        class="px-2 py-1 text-xs lg:px-3 lg:py-1.5">
                                                        {{ __('Delete') }}</x-button.danger>

                                                    <x-utility.alert name="confirm-ticket-deletion">
                                                        <div class="p-6">
                                                            <h2
                                                                class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                                {{ __('Are you sure you want to delete this ticket?') }}
                                                            </h2>

                                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                                {{ __('This action is irreversible.') }}
                                                            </p>

                                                            <div class="flex justify-end mt-6">
                                                                <x-button.secondary x-on:click="$dispatch('close')"
                                                                    type="button">
                                                                    {{ __('Cancel') }}
                                                                </x-button.secondary>

                                                                <x-button.danger
                                                                    wire:click="deleteTicket({{ $ticket->id }})">
                                                                    Trash It
                                                                </x-button.danger>
                                                            </div>
                                                        </div>
                                                    </x-utility.alert>
                                                </div>
                                            </x-table.cell>

                                        </x-table.row>
                                    @endforeach
                                @else
                                    <x-table.row>
                                        <x-table.cell>
                                            <div class="text-gray-900 dark:text-white">
                                                Not tickets found.
                                            </div>
                                        </x-table.cell>
                                    </x-table.row>
                                @endif
                            </x-slot>
                        </x-table.body>
                        <div class="text-gray-800 dark:text-gray-300">
                            {{ $tickets->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
