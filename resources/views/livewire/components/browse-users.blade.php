<div>
    <section class="py-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h3 class="text-xl text-gray-800 font-regular dark:text-gray-100">
                Browse Users
                <span class="text-sm text-gray-400 dark:text-gray-500">(ordered by latest)</span>
            </h3>
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
                                        User ID
                                    </x-table.heading>
                                    <x-table.heading>
                                        Name
                                    </x-table.heading>
                                    <x-table.heading>
                                        Email
                                    </x-table.heading>
                                    <x-table.heading>
                                        Join Date
                                    </x-table.heading>
                                </x-table.row>
                            </x-slot>

                            <x-slot name="body">

                                @if (count($users) > 0)
                                    @foreach ($users as $user)
                                        <x-table.row :wire:key="$user->id">
                                            <x-table.cell>
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div>
                                                            {{ $user->id }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </x-table.cell>

                                            <x-table.cell>
                                                <div>
                                                    {{ $user->name }}
                                                </div>
                                            </x-table.cell>

                                            <x-table.cell>
                                                <div>
                                                    {{ $user->email }}
                                                </div>
                                            </x-table.cell>

                                            <x-table.cell>
                                                <div>
                                                    {{ $user->created_at }}
                                                </div>
                                            </x-table.cell>

                                        </x-table.row>
                                    @endforeach
                                @else
                                    <x-table.row>
                                        <x-table.cell>
                                            <div class="text-gray-900 dark:text-white">
                                                Not users found.
                                            </div>
                                        </x-table.cell>
                                    </x-table.row>
                                @endif
                            </x-slot>
                        </x-table.body>
                        <div class="text-gray-800 dark:text-gray-300">
                            <div class="mt-4">
                                {{ $users->links('components.pagination.tailwind') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
