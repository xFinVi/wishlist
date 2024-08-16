<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center gap-6">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Notes') }}
            </h2>
            <x-button sm primary icon-right="plus" href="{{ route('notes.create') }}">Create a note.</x-button>
        </div>

    </x-slot>



    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">


            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <livewire:notes.show-notes lazy />
            </div>
        </div>
</x-app-layout>
