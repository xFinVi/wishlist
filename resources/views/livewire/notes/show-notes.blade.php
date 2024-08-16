<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public function delete($noteId)
    {
        $note = Note::where('id', $noteId)->first();
        $this->authorize('delete', $note);
        $note->delete();
    }

    public function with(): array
    {
        return [
            'notes' => Auth::user()->notes()->orderBy('send_date', 'asc')->get(),
        ];
    }
}; ?>

<div>
    <div class="space-y-4 ">
        @if ($notes->isEmpty())
            <div class="flex flex-col items-center justify-center gap-5 text-center">
                <p class="text-2xl font-bold">No notes available</p>
                <p class="text-sm">Let's create your first note!</p>
                <x-button sm primary icon-right="plus" href="{{ route('notes.create') }}">Create a note.</x-button>
            </div>
        @else
            <div class="grid grid-cols-2 gap-4 mt-12">


                @foreach ($notes as $note)
                    <x-card wire:key='{{ $note->id }}'>
                        <div class="flex justify-between ">
                            <div>
                                <a href="{{ route('notes.edit', $note) }}" wire:navigate
                                    class="font-bold text-l hover:underline hover:text-blue-500">{{ $note->title }}</a>
                                <p class="text-xs text-gray-400">{{ Str::limit($note->body, 30) }}</p>
                            </div>
                            <div class="text-xs text-gray-400">
                                {{ \Carbon\Carbon::parse($note->send_date)->format('d/m/Y') }}

                            </div>
                        </div>
                        <div class="flex items-end justify-between mt-4 space-x-1">
                            <p>Recipient : <span class="font-semibold">{{ $note->recipient }}</span></p>

                            <div class="spacy-x-3">

                                <x-mini-button xs rounded gray flat icon="eye" spinner focus:solid.cyan
                                    href="{{ route('notes.show', $note) }}" wire:navigate />
                                <x-mini-button xs rounded rose flat icon="x-mark"
                                    wire:click="delete('{{ $note->id }}')" />

                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endif
    </div>
</div>
