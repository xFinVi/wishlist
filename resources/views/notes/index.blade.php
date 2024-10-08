<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-start gap-6">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Notes') }}
            </h2>
            <x-button sm primary icon="plus" href="{{ route('notes.create') }}"
                class=" text-white bg-[#219ebc] hover:bg-[#8ecae6] lg">Create a note.</x-button>
        </div>

    </x-slot>



    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">


            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <livewire:notes.show-notes />
            </div>
        </div>
</x-app-layout>
