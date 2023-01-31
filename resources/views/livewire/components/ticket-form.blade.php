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
        <x-button.primary wire:click.prevent="saveTicket()">
            Submit
        </x-button.primary>
    </div>
</form>
