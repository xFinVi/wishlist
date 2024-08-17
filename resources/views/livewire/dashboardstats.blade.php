<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with()
    {
        return [
            'notesSentCount' => Auth::user()->notes()->where('send_date', '<', now())->where('is_published', true)->count(),
            'notesLovedCount' => Auth::user()->notes->sum('heart_count'),
            'recentNotes' => Auth::user()->notes()->orderBy('send_date', 'desc')->take(4)->get(),
        ];
    }
}; ?>

<div class="space-y-8">
    <!-- User Greeting -->
    <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">
        Welcome back, {{ Auth::user()->name }}!
    </div>

    <!-- Statistics -->
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-2 md:grid-cols-2">
        <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="flex items-center">
                <div>
                    <p class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Notes Sent</p>
                </div>
            </div>
            <div class="mt-6">
                <p class="text-3xl font-bold leading-9 text-gray-900 dark:text-gray-100">{{ $notesSentCount }}</p>
            </div>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="flex items-center">
                <div>
                    <p class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Notes Loved</p>
                </div>
            </div>
            <div class="mt-6">
                <p class="text-3xl font-bold leading-9 text-gray-900 dark:text-gray-100">{{ $notesLovedCount }}</p>
            </div>
        </div>
    </div>

    <!-- Recent Notes -->
    <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
        <div class="mb-4 text-lg font-medium text-gray-900 dark:text-gray-100">Recent Notes</div>
        <div class="flex flex-wrap items-center justify-center gap-5">
            @forelse ($recentNotes as $note)
                <div class="flex items-center justify-between p-4 bg-gray-100 rounded-lg w-80 dark:bg-gray-700 group">
                    <div>
                        @can('view', $note)
                            <a href="{{ route('notes.show', $note) }}" wire:navigate
                                class="font-bold text-gray-900 dark:text-gray-100">
                                {{ $note->title }}
                            </a>
                        @else
                            <p class="font-bold text-gray-500 dark:text-gray-400">
                                {{ $note->title }}
                                <span class="ml-2 text-xs font-medium text-red-500">(EXPIRED)</span>
                            </p>
                        @endcan
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            {{ \Carbon\Carbon::parse($note->send_date)->format('d/m/Y') }}
                        </p>
                    </div>

                    <div
                        class="flex items-center space-x-3 transition-opacity duration-300 opacity-0 group-hover:opacity-100">
                        <x-mini-button sm rounded rose flat icon="x-mark" wire:click="delete('{{ $note->id }}')" />
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-500 dark:text-gray-400">No recent notes available.</p>
            @endforelse
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('notes.index') }}" class="font-medium text-blue-500 hover:text-blue-700">View All
                Notes</a>
        </div>
    </div>
</div>
