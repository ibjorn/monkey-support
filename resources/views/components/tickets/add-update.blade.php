@props([
    'action' => 'submit',
])

<form>
    @csrf
    <div>
        <x-input.label for="subject" :value="__('Subject')" />
        <x-input.text type="text" wire:model="subject" id="subject" name="subject" :value="old('subject')" autofocus />
        <x-input.error :messages="$errors->get('subject')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input.label for="description" :value="__('Description')" />
        <x-input.textarea wire:model="description" />
        <x-input.error :messages="$errors->get('description')" class="mt-2" />
    </div>
    <div class="mt-4">
        @if ($action === 'submit')
            <x-button.primary wire:click.prevent="storeTicket()">
                Submit
            </x-button.primary>
        @endif
        @if ($action === 'update')
            <x-button.primary wire:click.prevent="updateTicket()">
                Update
            </x-button.primary>
        @endif
        <x-button.secondary wire:click.prevent="cancelTicket()">
            Cancel
        </x-button.secondary>
    </div>
</form>
