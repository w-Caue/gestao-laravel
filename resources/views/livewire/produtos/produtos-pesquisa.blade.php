<div>
    <x-modal.modal-large name="produtos" title="Pesquisa de" subtitle="produtos" z-index="70">
        @slot('body')
            @slot('icone')
                <x-icons.produtos class="size-10 mr-2 p-2"></x-icons.produtos>
            @endslot

            <div class="relative w-full flex sm:flex-row flex-col justify-between gap-5 px-2">
                <div class="flex items-end justify-between gap-5">
                    <div>
                        <span class="font-bold text-gray-500">Pesquise aqui</span>
                        <div class="flex items-center gap-1">
                            <x-input class="sm:w-80 w-full uppercase tracking-widest" wire:model.defer="search"
                                wire:keydown.enter='dados()'
                                placeholder="Pesquise o produto pelo {{ str_replace('.', '>', $sortField) }}" />

                            <x-buttons.primary wire:click="dados()">
                                <x-icons.search class="size-5" />
                            </x-buttons.primary>
                        </div>
                    </div>
                </div>

                <div x-data="{ filter: false, message: false }" class="relative flex justify-center items-center gap-5">
                    <div>
                        <button x-on:click="message = !message;"
                            class="font-bold tracking-widest text-blue-500 bg-blue-200 p-2 rounded-full hover:scale-95 transition-all">
                            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M3 3H12.382C12.7607 3 13.107 3.214 13.2764 3.55279L14 5H20C20.5523 5 21 5.44772 21 6V17C21 17.5523 20.5523 18 20 18H13.618C13.2393 18 12.893 17.786 12.7236 17.4472L12 16H5V22H3V3Z">
                                </path>
                            </svg>
                        </button>

                        <div x-show="message">
                            <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0" @keydown.escape="message = false; "
                                @click.away="message = false;"
                                class="absolute right-0 z-40 w-60 p-5 mt-4 space-y-4 text-gray-600 bg-white border shadow-lg rounded-md dark:shadow-gray-800 dark:text-gray-300 dark:bg-gray-800 dark:border-gray-700"
                                aria-label="submenu">

                                <h1 class="font-bold tracking-wider">Legendas</h1>

                                <div class="space-y-2">
                                    <span class="text-xs uppercase text-gray-400 dark:text-gray-500">Letras</span>
                                    <div class="mt-2">
                                        <div class="relative flex gap-1 items-center">
                                            <div class="bg-purple-700 p-2 rounded-full"></div>
                                            <x-inputs.label value="{{ 'Inativos' }}" />
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="w-full overflow-hidden mt-7 rounded-lg shadow-xs hidden lg:block">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr x-cloak x-data="{ tooltip: 'nenhum' }"
                                class="relative text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center items-center cursor-pointer"
                                            wire:click="sortBy('ID')" x-on:mouseover="tooltip = 'cod'"
                                            x-on:mouseleave="tooltip = 'nenhum'">
                                            <button
                                                class="text-xs font-medium leading-4 tracking-wider uppercase">Código</button>
                                            @include('includes.icon-filter', ['field' => 'ID'])
                                        </div>

                                        <div x-cloak x-show="tooltip === 'cod'" x-transition x-transition.duration.300ms
                                            class="absolute z-10 p-2 mt-6 text-xs font-bold bg-gray-100 rounded-md dark:bg-gray-700">
                                            <p>Ordenar pelo o Código</p>
                                        </div>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center items-center cursor-pointer"
                                            wire:click="sortBy('NOME')" x-on:mouseover="tooltip = 'nome'"
                                            x-on:mouseleave="tooltip = 'nenhum'">
                                            <button
                                                class="text-xs font-medium leading-4 tracking-wider uppercase">Nome</button>
                                            @include('includes.icon-filter', ['field' => 'NOME'])
                                        </div>

                                        <div x-cloak x-show="tooltip === 'nome'" x-transition x-transition.duration.300ms
                                            class="absolute z-10 p-2 mt-6 text-xs font-bold bg-gray-100 rounded-md dark:bg-gray-700">
                                            <p>Ordenar pelo o Nome</p>
                                        </div>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center items-center cursor-pointer">
                                        <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                            Descrição
                                        </button>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center items-center cursor-pointer">
                                        <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                            Tamanho
                                        </button>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center items-center cursor-pointer">
                                        <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                            Estoque
                                        </button>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center items-center cursor-pointer">
                                        <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                            Preço 1
                                        </button>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center items-center cursor-pointer">
                                        <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                            Preço 2
                                        </button>
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($produtos as $produto)
                                <tr wire:key="{{ $produto->ID }}"
                                    class="font-bold text-sm text-gray-700 dark:text-gray-300">
                                    <td class="py-3 text-center">
                                        #{{ $produto->ID }}
                                    </td>

                                    <td class="py-3 px-28 text-center">
                                        {{ $produto->NOME }}
                                    </td>

                                    <td class="py-3 text-center text-xs">
                                        {{ $produto->DESCRICAO }}
                                    </td>

                                    <td class="py-3 px-28 text-center">
                                        {{ $produto->TAMANHO }}
                                    </td>

                                    <td class="py-3 px-28 text-center">
                                        {{ $produto->ESTOQUE }}
                                    </td>

                                    <td class="py-3 px-28 text-center">
                                        R$ {{ number_format($produto->PRECO1, 2, ',') }}
                                    </td>

                                    <td class="py-3 px-28 text-center">
                                        R$ {{ number_format($produto->PRECO2, 2, ',') }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> --}}

            <div class="w-full overflow-y-auto p-1 block space-y-6 mt-3">
                @foreach ($produtos as $produto)
                    <div wire:key="{{ $produto->ID }}"
                        class="w-full p-1 font-semibold space-y-2 transition-all border rounded-md">
                        <div class="flex gap-6">

                            <div
                                class="relative flex content-center overflow-hidden rounded justify-items-center sm:w-20 w-20">
                                @livewire('produtos.produto-foto')
                            </div>

                            <div class="flex flex-col gap-1">
                                <span class="font-bold text-sm tracking-widest uppercase">
                                    {{ $produto->NOME }}
                                </span>

                                <div class="">
                                    <span class="text-xs tracking-widest uppercase">
                                        {{ $produto->DESCRICAO }}
                                    </span>
                                </div>
                                
                                <div class="flex items-center gap-2 text-center text-sm tracking-wider">
                                    <span>Preço:</span>
                                    R$ {{ number_format($produto->PRECO1, 2, ',') }}
                                </div>
                                {{-- 

                                <div class="flex items-center gap-2 text-center text-sm tracking-wider">
                                    <span>Estoque</span>
                                    {{ $produto->ESTOQUE }}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-between items-center mx-4 my-7 py-3">
                @include('includes.porPagina')

                {{-- {{ $clientes->links('components.pagination', ['is_livewire' => true]) }} --}}
            </div>

        @endslot
    </x-modal.modal-large>
</div>