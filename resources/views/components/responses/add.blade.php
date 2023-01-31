@props([
    'action' => 'submit',
])

<form>
    @csrf
    <div class="mt-4">
        <x-input.label for="reply" :value="__('Reply')" />
        <x-input.textarea wire:model="reply" />
        <x-input.error :messages="$errors->get('reply')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-button.primary wire:click.prevent="storeResponse()">
            Submit
        </x-button.primary>
        <x-button.secondary wire:click.prevent="cancelResponse()">
            Cancel
        </x-button.secondary>
    </div>
</form>
