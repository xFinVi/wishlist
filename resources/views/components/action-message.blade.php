@props(['on', 'duration' => 2000, 'class' => ''])

<div x-data="{ shown: false, timeout: null }" x-init="@this.on('{{ $on }}', () => {
    clearTimeout(timeout);
    shown = true;
    timeout = setTimeout(() => { shown = false }, {{ $duration }});
})" x-show.transition.opacity.duration.500ms="shown"
    x-transition:leave.opacity.duration.1500ms style="display: none;"
    {{ $attributes->merge(['class' => "text-sm text-white bg-green-500 p-4 rounded $class"]) }}>
    {{ $slot->isEmpty() ? 'Saved.' : $slot }}
</div>
