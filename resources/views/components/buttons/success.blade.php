@props([
    'type' => 'button',
])

<x-buttons
    {{ $attributes->merge(['class' => 'text-white bg-green-500 border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 outline-none focus:outline-none ease-linear duration-300 hover:scale-95']) }}>
    {{ $slot }}
</x-buttons>
