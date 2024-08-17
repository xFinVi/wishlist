<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {
    //
    public Note $note;

    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;
    public $noteIsPublished;

    public function mount(Note $note)
    {
        $this->authorize('update', $note);
        $this->fill($note);
        $this->noteTitle = $note->title;
        $this->noteBody = $note->body;
        $this->noteRecipient = $note->recipient;
        $this->noteSendDate = $note->send_date;
        $this->noteIsPublished = $note->is_published;
    }

    public function editNote()
    {
        $attributes = $this->validate([
            'noteTitle' => ['required', 'string', 'min:3'],
            'noteBody' => ['required', 'string', 'min:10'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date'],
        ]);

        $this->note->update([
            'title' => $this->noteTitle,
            'body' => $this->noteBody,
            'recipient' => $this->noteRecipient,
            'send_date' => $this->noteSendDate,
            'is_published' => $this->noteIsPublished,
        ]);

        $this->dispatch('note-saved');
    }
}; ?>

<div class="flex justify-center w-full mt-10">
    <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-md">
        <h2 class="mb-6 text-2xl font-semibold text-gray-800">Edit Note</h2>


        <form wire:submit="editNote" class="space-y-5">
            <div>
                <x-input wire:model="noteTitle" value="{{ $note->title }}" label="Title" placeholder="Trip" />
            </div>
            <div>
                <x-textarea wire:model="noteBody" value="{{ $note->body }}" label="Body"
                    placeholder="Enter note body here..." />
            </div>
            <div>
                <x-input wire:model="noteRecipient" value="{{ $note->recipient }}" label="Recipient"
                    placeholder="your@friend.com" />
            </div>
            <div>
                <x-input wire:model="noteSendDate" value="{{ $note->send_date }}" type="date" label="Send Date" />
            </div>
            <div>
                <x-checkbox label="Note Publish" wire:model='noteIsPublished'>Published</x-checkbox>
            </div>
            <div class="flex justify-between mt-6">
                <x-button type="submit" right-icon="calendar" class=" text-white bg-[#ffb703] hover:bg-[#fb8500] lg" sm
                    spinner>Save Note</x-button>
                <x-button href="{{ route('notes.index') }}" negative sm flat right-icon="calendar" spinner>Back To
                    Notes</x-button>
            </div>

            <x-errors />
        </form>
        <x-action-message on="note-saved" duration="3000" class="mt-4 shadow-lg">
            Note has been saved successfully!
        </x-action-message>
    </div>

</div>
