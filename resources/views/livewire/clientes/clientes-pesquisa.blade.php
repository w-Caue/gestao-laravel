<div>
    <x-modal.modal-large name="clientes" title="Pesquisa de" subtitle="Clientes" z-index="60">
        @slot('body')
            @slot('icone')
                <x-icons.clientes class="size-10 mr-2 p-2"></x-icons.clientes>
            @endslot

            <div class="relative w-full flex sm:flex-row flex-col justify-between gap-5 px-2">
                <div class="flex items-end justify-between gap-5">
                    <div>
                        <span class="font-bold text-gray-500">Pesquise aqui</span>
                        <div class="flex items-center gap-1">
                            <x-input class="sm:w-80 w-full uppercase tracking-widest" wire:model.defer="search" wire:keydown.enter='dados()'
                                placeholder="Pesquise o cliente pelo {{ str_replace('.', '>', $sortField) }}" />

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

                    <div>
                        <button x-on:click="filter = !filter;"
                            class="font-bold tracking-widest text-orange-500 bg-orange-200 p-2 rounded-md hover:scale-95 transition-all">
                            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M10 18H14V16H10V18ZM3 6V8H21V6H3ZM6 13H18V11H6V13Z"></path>
                            </svg>
                        </button>

                        <div x-show="filter">
                            <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0" @click.away="filter = false;"
                                class="absolute right-0 z-40 w-60 p-5 mt-4 space-y-4 text-gray-600 bg-white border shadow-lg rounded-md dark:shadow-gray-800 dark:text-gray-300 dark:bg-gray-800 dark:border-gray-700"
                                aria-label="submenu">

                                <span class="font-bold tracking-wider">Filtros</span>
                                <div class="space-y-3">
                                    <div
                                        class="inline-flex items-center w-full px-2 py-1  text-xs font-semibold uppercase transition-colors duration-150 ">
                                        <x-checkbox.primary wire:model.live="favoritos" class="mr-2"
                                            id="favoritos"></x-checkbox.primary>

                                        <label for="favoritos">Favoritos</label>
                                    </div>
                                    <div
                                        class="inline-flex items-center w-full px-2 py-1  text-xs font-semibold uppercase transition-colors duration-150 ">
                                        <x-checkbox.primary wire:model.live="inativos" class="mr-2"
                                            id="inativos"></x-checkbox.primary>

                                        <label for="inativos">Inativos</label>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full overflow-hidden rounded-lg shadow-xs hidden lg:block mt-5">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr x-cloak x-data="{ tooltip: 'nenhum' }"
                                class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center items-center cursor-pointer"
                                            wire:click="sortBy('CODIGO')" x-on:mouseover="tooltip = 'cod'"
                                            x-on:mouseleave="tooltip = 'nenhum'">
                                            <button
                                                class="text-xs font-medium leading-4 tracking-wider uppercase">Cod</button>
                                            @include('includes.icon-filter', [
                                                'field' => 'CODIGO',
                                            ])
                                        </div>

                                        <div x-cloak x-show="tooltip === 'cod'" x-transition x-transition.duration.300ms
                                            class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-100 rounded-md dark:bg-gray-700">
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
                                            class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-100 rounded-md dark:bg-gray-700">
                                            <p>Ordenar pelo o Nome</p>
                                        </div>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                        Telefone
                                    </button>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($clientes as $cliente)
                                <tr wire:key="{{ $cliente->ID }}"
                                    wire:click="$dispatchTo('pedidos.pedido-novo','setClientePedido', { codigo: {{ $cliente->ID }}})"
                                    class="font-semibold text-sm hover:bg-gray-300 dark:hover:bg-gray-700 hover:cursor-pointer">
                                    <td class="py-3 text-center text-blue-500">
                                        #{{ $cliente->ID }}
                                    </td>

                                    <td class="py-3 flex justify-center items-center">
                                        <div class="text-start">
                                            {{ $cliente->NOME }}
                                        </div>
                                    </td>

                                    <td class="py-3 text-center">
                                        {{ $cliente->TELEFONE }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="w-full overflow-y-auto h-56 p-4 block lg:hidden space-y-6">
                @foreach ($clientes as $cliente)
                    <div wire:key="{{ $cliente->ID }}"
                        wire:click="$dispatchTo('tenant.movimentacao.pedidos.criar-pedido','setClientePedido', { codigo: {{ $cliente->ID }}})"
                        class="w-full p-2 rounded-lg space-y-2 bg-gray-100 hover:scale-105 transition-all dark:bg-gray-900">
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-blue-500">#{{ $cliente->ID }}</span>

                            <h1 class="font-bold text-xs uppercase tracking-widest dark:text-gray-400">
                                {{ $cliente->NOME }}
                            </h1>

                        </div>
                        <span class="font-bold text-sm tracking-widest uppercase text-blue-500">
                            {{ $cliente->TELEFONE }}
                        </span>
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
