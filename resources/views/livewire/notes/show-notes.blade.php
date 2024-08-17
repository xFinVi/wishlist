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
    <div>
        <div class="space-y-4">
            @if ($notes->isEmpty())
                <div class="flex flex-col items-center justify-center gap-5 text-center">
                    <p class="text-2xl font-bold">No notes available</p>
                    <p class="text-sm ">Let's create your first note!</p>
                    <x-button class="text-white bg-[#fb8500] hover:bg-[#ffb703] lg" icon-right="plus"
                        href="{{ route('notes.create') }}">
                        Create a note
                    </x-button>

                </div>
            @else
                <div class="grid grid-cols-1 gap-4 mt-12 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($notes as $note)
                        <x-card wire:key='{{ $note->id }}' class="p-4 group">
                            <div class="flex flex-col justify-between md:flex-row">
                                <div class="flex-1">
                                    @can('update', $note)
                                        <a href="{{ route('notes.edit', $note) }}" wire:navigate
                                            class="font-bold text-l hover:underline hover:text-blue-500">
                                            {{ $note->title }}
                                        </a>
                                    @else
                                        <p class="text-xl font-bold text-gray-500">{{ $note->title }} <span
                                                class="text-xs text-red-500">>EXPIRED</span></p>
                                    @endcan
                                    <p class="text-xs text-gray-400">{{ Str::limit($note->body, 30) }}</p>
                                </div>
                                <div class="mt-2 text-xs text-gray-400 md:mt-0 md:text-right">
                                    {{ \Carbon\Carbon::parse($note->send_date)->format('d/m/Y') }}
                                </div>
                            </div>
                            <div
                                class="flex flex-col items-end justify-between mt-4 space-x-0 md:flex-row md:space-x-1">
                                <p class="mb-2 md:mb-0">Recipient :
                                    @if ($note->recipient)
                                        <span class="font-semibold">{{ $note->recipient }}</span>
                                    @else
                                        <span class="text-xs text-gray-500">Add a recipient</span>
                                    @endif
                                </p>

                                <div
                                    class="flex space-x-3 transition-opacity duration-300 opacity-0 group-hover:opacity-100">
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
</div>
