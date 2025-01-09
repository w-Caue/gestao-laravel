<div>
    @livewire('pedidos.pedidos-cards')
    <div class="p-2 bg-white rounded-lg shadow-2xl dark:bg-gray-800">

        <div class="relative w-full flex sm:flex-row flex-col justify-between gap-5">
            <div class="flex items-end justify-between gap-5">
                <div>
                    <span class="font-bold text-gray-500">Pesquise aqui</span>
                    <div class="flex items-end gap-1">
                        <x-input class="sm:w-80 w-full uppercase tracking-widest" wire:model.defer="search"
                            wire:keydown.enter='data()'
                            placeholder="Pesquise o pedido pelo {{ str_replace('.', '>', $sortField) }}" />

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

                <x-buttons.primary x-on:click="$dispatch('open-modal-small', { name : 'cadastro' })"
                    class="flex items-center gap-1">
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 11H7V13H11V17H13V13H17V11H13V7H11V11Z">
                        </path>
                    </svg>
                    <span>Novo</span>
                </x-buttons.primary>
            </div>
        </div>

        <div class="w-full overflow-hidden mt-7 rounded-lg shadow-xs hidden lg:block">
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
                                        wire:click="sortBy('CLIENTE')" x-on:mouseover="tooltip = 'cliente'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        <button
                                            class="text-xs font-medium leading-4 tracking-wider uppercase">Cliente</button>
                                        @include('includes.icon-filter', ['field' => 'CLIENTE'])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'cliente'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs font-bold bg-gray-100 rounded-md dark:bg-gray-700">
                                        <p>Ordenar pelo o Cliente</p>
                                    </div>
                                </div>
                            </th>

                            <th class="px-4 py-3">
                                <div class="flex justify-center items-center cursor-pointer">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                        Observação
                                    </button>
                                </div>
                            </th>

                            <th class="px-4 py-3">
                                <div class="flex justify-center items-center cursor-pointer">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                        Vendedor
                                    </button>
                                </div>
                            </th>

                            <th class="px-4 py-3">
                                <div class="flex justify-center items-center cursor-pointer">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                        Data
                                    </button>
                                </div>
                            </th>

                            <th class="px-4 py-3">
                                <div class="flex justify-center items-center cursor-pointer">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                        Pagamento
                                    </button>
                                </div>
                            </th>

                            <th class="px-4 py-3">
                                <div class="flex justify-center items-center cursor-pointer">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                        Valor Total
                                    </button>
                                </div>
                            </th>

                            <th class="px-4 py-3">
                                <div class="flex justify-center items-center cursor-pointer">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                        Ação
                                    </button>
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($pedidos as $pedido)
                            <tr wire:key="{{ $pedido->ID }}"
                                class="font-bold text-sm text-gray-700 dark:text-gray-300">
                                <td class="py-3 text-center">
                                    #{{ $pedido->ID }}
                                </td>

                                <td class="py-3 px-28 text-center">
                                    {{ $pedido->CLIENTE_NOME }}
                                </td>

                                <td class="py-3 text-center text-xs">
                                    {{ $pedido->OBSERVACAO }}
                                </td>

                                <td class="py-3 px-28 text-center">
                                    {{ $pedido->VENDEDOR_NOME }}
                                </td>

                                <td class="py-3 pr-8 text-xs text-center">
                                    {{ date('d/m/Y', strtotime($pedido->DATA_CADASTRO)) }}
                                </td>

                                <td class="py-3 text-center">
                                    {{ $pedido->PAGAMENTO == 'D' ? 'DINHEIRO' : '' }}
                                </td>

                                <td class="py-3 text-center">
                                    {{ number_format($pedido->TOTAL, 2, ',') }}
                                </td>

                                <td class="py-3 flex justify-center">
                                    <button wire:click="$dispatchTo('pedidos.pedidos-register','consulta', { codigo: {{ $pedido->ID }}})" x-on:click="$dispatch('open-exlarge-modal', { name : 'pedidoCompleto' })" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700">
                                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z">
                                            </path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-full overflow-y-auto p-1 block lg:hidden space-y-6 mt-3">
            @foreach ($pedidos as $pedido)
                <div wire:click="$dispatchTo('pedidos.pedidos-register','consulta', { codigo: {{ $pedido->ID }}})" wire:key="{{ $pedido->ID }}" x-on:click="$dispatch('open-exlarge-modal', { name : 'pedidoCompleto' })"
                    class="w-full p-2 rounded-lg space-y-2 border-2 shadow-lg hover:scale-105 dark:hover:shadow-gray-700 transition-all dark:border-gray-700 hover:cursor-pointer">
                    <div class="flex justify-between items-center">
                        <span class="font-bold">#{{ $pedido->ID }}</span>

                        <h1 class="font-bold text-xs uppercase tracking-widest">
                            {{ date('d/m/Y', strtotime($pedido->DATA_CADASTRO)) }}
                        </h1>
                    </div>

                    <span class="font-bold text-sm tracking-widest uppercase text-blue-500">
                        {{ $pedido->CLIENTE_NOME }}
                    </span>

                    <h1 class="font-bold text-sm tracking-widest uppercase">
                        {{ $pedido->OBSERVACAO }}
                    </h1>

                    <div class="flex justify-between items-center flex-wrap text-sm tracking-wider font-semibold">
                        pagamento: {{ $pedido->PAGAMENTO == 'D' ? 'DINHEIRO' : '' }}
                    </div>

                    <div class="flex justify-between items-center flex-wrap text-sm tracking-wider font-semibold">
                        total: {{ number_format($pedido->TOTAL, 2, ',') }}
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    @livewire('clientes.clientes-pesquisa')
    
    @livewire('produtos.produtos-pesquisa')

    @livewire('pedidos.pedido-novo')

    @livewire('pedidos.pedidos-register')
</div>
