@props([
    'type' => 'button',
    'color',
])

<x-buttons
    {{ $attributes->merge(['class' => 'text-blue-500 bg-blue-200 focus:outline-blue ease-linear duration-300 hover:scale-95']) }}>
    {{ $slot }}
</x-buttons>
