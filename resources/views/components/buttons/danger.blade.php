@props([
    'type' => 'button',
])

<x-buttons
    {{ $attributes->merge(['class' => 'text-white bg-red-500 border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 outline-none focus:outline-none ease-linear duration-300 hover:scale-95']) }}>
    {{ $slot }}
</x-buttons>
