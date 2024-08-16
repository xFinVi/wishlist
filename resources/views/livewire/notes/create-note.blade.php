<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function submit()
    {
        $attributes = $this->validate([
            'noteTitle' => ['required', 'string', 'min:3'],
            'noteBody' => ['required', 'string', 'min:10'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date'],
        ]);
        auth()
            ->user()
            ->notes()
            ->create([
                'title' => $this->noteTitle,
                'body' => $this->noteBody,
                'recipient' => $this->noteRecipient,
                'send_date' => $this->noteSendDate,
                'is_published' => false,
            ]);

        redirect(route('notes.index'));
    }
}; ?>

<div>

    <form wire:submit='submit' class="space-y-4">
        <x-input wire:model="noteTitle" :value="old('noteTitle')" label='Title' placeholder="Trip" />
        <x-textarea wire:model="noteBody" :value="old('noteBody')" label='Body' placeholder="Europe trip to Paris with ..." />
        <x-input wire:model="noteRecipient" :value="old('noteRecipient')" label='Recipient' placeholder="your@friend.com" />
        <x-input wire:model="noteSendDate" :value="old('noteSendDate')" type="date" label='Send Date' />
        <x-button type="submit" class="mt-3" primary right-icon="calendar" spinner>Submit</x-button>
    </form>
</div>
