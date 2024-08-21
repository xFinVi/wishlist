<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ $note->title }}
            </h2>
        </div>

    </x-slot>



    <div class="w-full max-w-lg p-8 mx-auto mt-10 bg-white rounded-lg shadow-md">
        <div class="flex items-center mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="p-6 text-gray-900">

                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ $note->title }}
                </h2>
                <p>
                    {{ $note->body }}
                </p>
                <h3>{{ $user->name }}</h3>
            </div>
            <div class="p-6">
                <livewire:heartreact :note="$note" />
            </div>




        </div>
    </div>
    <div class="flex justify-center mt-8">
        @can('update', $note)
            <x-button icon="pencil" flat gray href="{{ route('notes.edit', $note) }}" wire:navigate />
        @endcan

        <x-button icon="arrow-left" flat gray href="{{ route('notes.index') }}">
            Back to Notes
        </x-button>
    </div>
</x-app-layout>
