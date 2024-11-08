@props([
    'type' => 'button',
])

<x-buttons
    {{ $attributes->merge(['class' => 'text-white bg-blue-500 border border-solid border-blue-500 hover:bg-blue-500 hover:text-white active:bg-blue-600  focus:outline-blue ease-linear duration-300 hover:scale-95']) }}>
    {{ $slot }}
</x-buttons>
