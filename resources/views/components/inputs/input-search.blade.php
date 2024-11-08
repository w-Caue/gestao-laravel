@props([
    'placeholder' => $placeholder,
])

<div class="relative w-full md:w-72">
    <input 
        class="block p-3 w-full shadow-md font-semibold border rounded-lg text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-blue-600 active:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
       placeholder="{{ $placeholder }}">

    <button class="absolute top-0 right-0 p-3 text-sm text-gray-500 font-medium rounded transition-all">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </button>
</div>
